<div class="card w-96   shadow-xl m-4">
    <figure><img src="{{$image}}"  class="object-cover w-full h-64" alt="Shoes" /></figure>
    <div class="card-body text-black">
      <p class="text-red-600">   {{$timeStart}} - {{$timeEnd}}</p>
      <h2 class="card-title">
      {{$title}}
      </h2>
      <p class="line-clamp-3">{{$location_name}}</p>
      <p class="line-clamp-3">{{$description}}</p>


      <div class="card-actions justify-end">
        <div class="badge badge-outline">{{$category}}</div>

      </div>
    </div>
</div>
