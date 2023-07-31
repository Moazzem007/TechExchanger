{{--    Search bar--}}
<div class="container">

    <div class="row height d-flex justify-content-center align-items-center">

        <div class="col-md-8">

            <div class="search">
                <i class="fa fa-search"></i>
                <form action="{{route('search')}}" method="post">
                @csrf
                  <input type="text" class="form-control" name="search" placeholder="Have a product in mind? Search Now">
                  <button type="submit" class="btn btn-primary">Search</button>
                </form>

            </div>

        </div>

    </div>
</div>
{{--    End of searchbar--}}
