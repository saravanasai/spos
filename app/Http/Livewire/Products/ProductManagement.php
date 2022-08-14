<?php

namespace App\Http\Livewire\Products;

use App\Models\Products\Products;
use Livewire\Component;

class ProductManagement extends Component
{

    public Products $product;

    public $branchId;


    protected $rules = [
        'product.product_name' => 'required',
        'product.product_code' => 'required',
        'product.product_quantity' => 'required|numeric',
        'product.product_price' => 'required|numeric',
        'product.product_of_branch' => 'required|numeric',
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->branchId = auth('web')->user() ? auth('web')->user()->current_branch : auth('employee')->user()->branch_id;
        $this->product = new Products();
        $this->product->product_of_branch = $this->branchId;
    }

    public function destroy($id)
    {
        Products::destroy($id);

        $this->emit('refreshComponent');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function addProduct()
    {
        $this->validate();

        $this->product->save(['product_of_branch' => $this->branchId]);

        session()->flash('product-added', 'Product Added');

        $this->product = new Products();

        $this->emit('alert_remove');
    }


    public function render()
    {
        return view('livewire.products.product-management', ['products' => Products::where('product_of_branch', $this->branchId)->paginate(5)]);
    }
}
