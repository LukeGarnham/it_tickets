<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\TicketImpact;
use App\Models\TicketStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = TicketStatus::query()->inRandomOrder()->firstOrFail();
        $isClosed = $status->name === 'Closed';
        return [
            'title' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'ticket_impact_id' => fake()->passthrough(TicketImpact::inRandomOrder()->value('id')),
            'ticket_status_id' => $status->id,
            'due_date' => fake()->optional()->passthrough(fake()->dateTimeBetween('+1 day', '+2 months')->format('Y-m-d')),
            'closed_by' => $isClosed ? User::query()->where('is_it_dept', true)->inRandomOrder()->value('id') : null,
            'closed_at' => $isClosed ? fake()->dateTimeBetween('-2 months') : null,
            'resolution' => $isClosed ? fake()->sentence() : null,
            'created_by' => User::query()->inRandomOrder()->value('id'),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Ticket $ticket): void {
            $category = Category::query()->inRandomOrder()->firstOrFail();
            $ticket->categories()->attach($category);
            if ($category->name === 'Other') {
                $ticket->update(['category_other' => fake()->words(3, true)]);
            }
            $owners = User::query()
                ->inRandomOrder()
                ->limit(fake()->numberBetween(1, 2))
                ->pluck('id');
            $ticket->owners()->sync($owners);
            $assignees = User::query()
                ->where('is_it_dept', true)
                ->inRandomOrder()
                ->limit(fake()->numberBetween(1, 2))
                ->pluck('id');
            $ticket->assignees()->sync($assignees);
            if (fake()->boolean(5)) {
                $eligibleDeleters = $owners->merge($assignees)->unique()->values();
                $ticket->update(['deleted_by' => $eligibleDeleters->random()]);
                $ticket->delete();
            }
        });
    }
}
