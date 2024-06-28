<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="bg-dark py-3">
        <h2 class="text-white text-center"> CRUD Operations in Laravel </h2>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('Products.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-1 shadow-lg my-4">
                    <div class="card-header bg-dark pt-2">
                        <h3 class="text-center text-white"> Create Product </h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('Products.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="product_name" class="form-label h5">Product Name</label>
                                <input type="text" value="{{ old('product_name') }}" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name" name="product_name"/>
                                @error('product_name')
                                    <!-- {{ $message }} -->
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <!-- SKU = Stock keeping unit -->
                                <label for="" class="form-label h5">Sku</label>
                                <input type="text" value="{{ old('sku') }}" class="@error('sku') is-invalid @enderror form-control form-control-lg" placeholder="Sku" name="sku"/>
                                @error('sku')
                                    <!-- {{ $message }} -->
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label h5">Price</label>
                                <input type="Integer" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="price" name="price"/>
                                @error('price')
                                    <!-- {{ $message }} -->
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label h5">Description</label>
                                <textarea placeholder="Description..." type="text" class="form-control form-control-lg text-black" rows="4" cols="50" name="description"> </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label h5">Product Image</label>
                                <input type="file" class="form-control form-control-lg" placeholder="Image" name="image"/>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
  </body>
</html>