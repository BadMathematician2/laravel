<?php


namespace App\Packages\GoogleObjectsCategories;


use App\Packages\GoogleObjectsCategories\Models\GoogleObjectCategory;

/**
 * Class GoogleObjectsCategories
 * @package App\Packages\GoogleObjectsCategories
 */
class GoogleObjectsCategories
{
    /**
     * @param string $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|string
     */
    public function createCategory(string $data)
    {
        $object = json_decode($data, true);

        if (GoogleObjectCategory::query()->where('place_id', $object['place_id'])->exists()) {
            return 'It already exist';
        }

        $categories = config('categories');

        return GoogleObjectCategory::query()->create($this->addCategories($categories, $object));
    }

    /**
     * $object - масив, утворенний декодуванням json інформауії про об'єкт
     * $categories - це масив із назвами стоврців, але стопбець може бути підкатегорією в об'єкті
     * (наприклад lat, lng знаходяться в geometry/location), тому якщо це так, то в значення масива
     * входить весь "шлях" до назви (тобто повертаючись до попереднього прикладу: для lat буде geometry/location/lat).
     * Враховуючи, написане вище, ми розбиваємо кожен елемент розділючачем "/" і беремо відповідне значення ключа.
     * Якщо значення стовпчика буде масивом, то ми записемо його json (це для types).
     * Повертаємо масив із назви стовпчика і його значення.
     *
     * @param array $categories
     * @param array $object
     * @return array
     */
    private function addCategories(array $categories, array $object) : array
    {
        $result = [];
        foreach ($categories as $category) {
            $parts = explode('/', $category);
            $value = $object;

            foreach ($parts as $part) {
                $value = isset($value[$part]) ? $value[$part] : null;
            }


            if (is_array($value)) {
                $value = json_encode($value);
            }

            $result[$parts[sizeof($parts) - 1]] = $value;
        }
        return $result;
    }

}
