<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Unos kategorije</h4>
                @if (Auth::user()->role == 'userCR')
                <form action="{{route('cr.product.store')}}"  method ="POST">
                @else
                <form action="{{route('product.store')}}"  method ="POST">
                @endif
                    @csrf
                    @method('post')
                 <div class="mt-3">
                    <label for="category_name">Naziv kategorije </label>
                    <input type="text" name="category_name" class="form-controll">
                 </div>
                <div class="mt-3">
                    <label for="category_active">Aktivna kategorija </label>
                    <input type="text" name="category_active" class="form-controll">
                </div>
                <div class="mt-3">
                    <label for="category_status">Status kategorije</label>
                    <input type="text" name="category_status" class="form-controll">
                </div>
                <div class="mt3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Unesi">
                </div>
                    


            </form>

            </div>
        </div>
    </div>

    
                      
                   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>