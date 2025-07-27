<?php

namespace App\Repositories;

use App\DataTransferObjects\PropertyDTO;
use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
use App\Filters\PropertyFilter;
use App\Interfaces\PropertyInterface;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyRepository implements PropertyInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(public PropertyFilter $propertyFilter)
    {
        //
    }

    public function getTotalProperties(): int
    {
      return Property::count();
    }


    public function store(PropertyDTO $dto): Property
    {
        return Property::create($dto->toArray());
    }

    
    public function getSellRequestData(Property $property): Property
    {
          return Property::with('sellRequest')->find($property->id);
    }




    public function update(PropertyDTO $dto, Property $property): Property
    {
        $property->fill($dto->toArray())->save();

        return $property->refresh();
    }


    public function getProperties(Request $request): LengthAwarePaginator
    {
        return $this->propertyFilter->apply(Property::query(), $request)->paginate(6)->withQueryString();
    }



    public function destroy(Property $property): bool
    {
        $property->clearMediaCollection('thumbnail');
        $property->clearMediaCollection('other_images');

        return  $property->delete();
    }
}
