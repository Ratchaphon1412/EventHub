<div class="card w-96 h-96  shadow-xl m-4">
    <figure><img src="{{$image}}" alt="Shoes" /></figure>
    <div class="card-body text-black">
      <h2 class="card-title">
      {{$title}}
      </h2>
      <p class="line-clamp-3">{{$location_name}}</p>
      <p class="line-clamp-3">{{$description}}</p>


      <div class="card-actions justify-end">
        <div class="badge badge-outline">{{$category}}</div> 
        <div class="badge badge-outline">
          {{$timeStart}} to {{$timeEnd}}
        </div>
      </div>
    </div>
</div>