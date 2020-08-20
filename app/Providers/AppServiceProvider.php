<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Region\RegionRepositoryInterface::class,
            \App\Repositories\Region\RegionRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Profile\ProfileRepositoryInterface::class,
            \App\Repositories\Profile\ProfileRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Hotel\HotelRepositoryInterface::class,
            \App\Repositories\Hotel\HotelRepository::class,

        );

        $this->app->singleton(
            \App\Repositories\Room\RoomRepositoryInterface::class,
            \App\Repositories\Room\RoomRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Images\ImagesRepositoryInterface::class,
            \App\Repositories\Images\ImagesRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Bed\BedRepositoryInterface::class,
            \App\Repositories\Bed\BedRepository::class,
        );

        $this->app->singleton(
            \App\Repositories\Booking_Date\Booking_DateRepositoryInterface::class,
            \App\Repositories\Booking_Date\Booking_DateRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (array_wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);
        
                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });
        
            return $this;
        });
    }
}
