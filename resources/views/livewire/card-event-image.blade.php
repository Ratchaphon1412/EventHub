<div class="card w-96   shadow-xl m-4">
    <figure><img src="{{$image}}"  class="object-cover w-full h-64" alt="Shoes" /></figure>
    <div class="card-body text-black">
      <h2 class="card-title">
      {{$title}}
        {{-- <div class="badge badge-secondary">{{$status}}</div> --}}
      </h2>
      <p class="line-clamp-3">{{$description}}</p>
      <div class="card-actions justify-end">
        <div class="badge badge-outline">{{$category}}</div> 
      
      </div>
    </div>
</div>