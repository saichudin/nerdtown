<?php
/**
 * Created by PhpStorm.
 * User: jowy
 * Date: 2/9/20
 * Time: 8:08 AM
 */

namespace App\Http\Controllers;


use App\Http\Requests\CreateMedia;
use App\Models\Product;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class MediaController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function destroy(Media $medium)
    {
        try {
            $name  = $medium->name;
            $model = $medium->model;
            $medium->delete();

            flash()->warning(__('Media :name has been deleted', ['name' => $name]));
        } catch (\Exception $e) {
            flash()->error(__('Error: :msg', ['msg' => $e->getMessage()]));

            return redirect()->back();
        }

        // E.g. 'product'
        $modelName = Str::singular(shorten(get_class($model)));

        return redirect(route(
                sprintf('vanilo.%s.edit', $modelName),
                [$modelName => $model]
            )
        );
    }

    public function store(CreateMedia $request)
    {
        if ($request->get('for') !== 'product') {
            throw new BadRequestHttpException('invalid model');
        }

        $model = $this->product->findOrFail((int) $request->get('forId'));

        $model->addMultipleMediaFromRequest(['images'])->each(function ($fileAdder) {
            $fileAdder->toMediaCollection();
        });

        return back()->with('success', __('Images have been added successfully'));
    }
}
