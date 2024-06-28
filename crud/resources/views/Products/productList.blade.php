<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .pagination {
            justify-content: space-between;
        }
        .page-link {
            color: #007bff;
        }
        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
    
  </head>
  <body>
    
    <div class="bg-dark py-3">
        <h2 class="text-white text-center"> CRUD Operations in Laravel </h2>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('Products.create') }}" class="btn btn-dark">Create</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(Session::has('success'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif

            <div class="col-md-10">
                <div class="card border-1 shadow-lg my-4">
                    <div class="card-header bg-dark pt-2">
                        <h3 class="text-center text-white"> Products List </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <!-- <th>Product ID</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Sku</th>
                                <th>Product Price</th>
                                <th>Description</th>
                                <th>Product Created at</th>
                                <th>Action</th> -->
                                <th>ID</th>
                                <th>Product Image</th>
                                <th>Name</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if($products->isNotEmpty())
                                
                                @foreach($products as $product)
                                
                                    <tr>
                                        <td>{{ $product->product_id }}</td>
                                        
                                        <td>
                                            <!-- @if ($product->product_image != "")
                                            <img width="50" src="{{ asset('/public/storage/uploads/products/'.$product->product_image) }}" alt="">
                                            @endif -->

                                            @if (!empty($product->product_image) && file_exists(public_path('storage/uploads/products/' . $product->product_image)))
                                                <img width="50" src="{{ asset('storage/uploads/products/' . $product->product_image) }}" alt="">
                                            @endif


                                        </td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->product_description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ route('Products.edit', $product->product_id) }}" class="btn btn-dark">Edit</a>
                                            <!-- <a href="{{ route('Products.edit', $product->product_id) }}" class="btn btn-danger">Delete</a>

                                            <form>

                                            </form> -->

                                            <a href="#" onclick="deleteProduct ({{ $product->product_id  }});" class="btn btn-danger">Delete</a>
                                            <form id="delete-product-from-{{ $product->product_id  }}" action="{{ route('Products.destroy',$product->product_id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>

                                        </td>

                                        
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        
                        {{ $products->links('pagination::bootstrap-5') }}
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
   
  </body>
</html>


<script>
    function deleteProduct(product_id) {
        if (confirm("Are you sure you want to delete product?")) {
            document.getElementById("delete-product-from-"+product_id).submit();
        }
    }
</script>