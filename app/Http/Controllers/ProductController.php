<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Price;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('livewire.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'created_at' => Carbon::now('Europe/Warsaw'),
                'updated_at' => null
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->route('dashboard')->with('error', __('There has been an error while creating product'));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            foreach ($request->prices as $price) {
                Price::create([
                    'product_id' => $product->id,
                    'price' => $price,
                    'created_at' => Carbon::now('Europe/Warsaw'),
                    'updated_at' => null
                ]);
            }
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->route('dashboard')->with('error', __('There has been an error while creating product'));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return redirect()->route('dashboard')->with('success', __('Product saved successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {

        return view('livewire.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        return view('livewire.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_at' => Carbon::now('Europe/Warsaw'),
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->route('dashboard')->with('error', __('There has been an error while updating product'));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

//        CHECKING IF ANY ITEM IN PRODUCT PRICES WAS CHANGED

        $currentPrices = $product->prices()->pluck('price')->toArray();
        $priceDiff = array_diff($request->prices, $currentPrices);

        if (!empty($priceDiff)) {

            try {
                Price::where('product_id', $product->id)->delete();
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->route('dashboard')->with('error', __('There has been an error while updating product'));
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {
                foreach ($request->prices as $price) {
                    Price::create([
                        'product_id' => $product->id,
                        'price' => $price,
                        'created_at' => Carbon::now('Europe/Warsaw'),
                        'updated_at' => null
                    ]);
                }
            } catch (ValidationException $e) {
                DB::rollback();
                return redirect()->route('dashboard')->with('error', __('There has been an error while updating product'));
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        }

        DB::commit();

        return redirect()->route('dashboard')->with('success', __('Product updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->route('dashboard')->with('error', __('There has been an error while deleting product'));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->route('dashboard')->with('success', __('Product deleted successfully.'));

    }
}
