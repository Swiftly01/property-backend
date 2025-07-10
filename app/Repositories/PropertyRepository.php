<?php

namespace App\Repositories;

use App\DataTransferObjects\PropertyDTO;
use App\Interfaces\PropertyInterface;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PropertyRepository implements PropertyInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function store(PropertyDTO $dto): Property
    {
        return Property::create($dto->toArray());
    }

    public function update(PropertyDTO $dto, Property $property): Property
    {
        $property->fill($dto->toArray())->save();

        return $property->refresh();
    }


    public function getAllProperties(Request $request): LengthAwarePaginator
    {   
        $query = Property::query();

        if($request->filled('search')) {
             $query->where( function($q) use ($request){
                $q->where('title', 'like', "%{$request->search}%")
                  ->orWhere('location', 'like', "%{$request->search }%")
                  ->orWhere('price', 'like', "%{$request->search }%")
                  ->orWhere('description', 'like', "%{$request->search}%"); });
          
           
        }
      
        if($request->filled('status')){
            $query->where('status', 'like', "%{$request->status}%");

          
        }

        return $query->paginate(3);
    }


    public function destroyThumbnail(Property $property): bool
    {
        $thumbnail = $property->getFirstMedia('thumbnail');

        if ($thumbnail === null) {
            return false;
        }

        $thumbnail->delete();
        return true;
    }


    public function destroy(Property $property): bool
    {
        $property->clearMediaCollection('thumbnail');
        $property->clearMediaCollection('other_images');

        return  $property->delete();
    }
}
