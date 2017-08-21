<h1 class="my-4">Categorties</h1>
<div class="list-group">
   @foreach (App\Category::all() as $cat)
      <a href="/category/{{$cat->id}}" class="list-group-item">{{$cat->name}}</a>
   @endforeach
</div>
