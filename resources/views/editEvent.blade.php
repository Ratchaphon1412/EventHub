
    <main class="flex-col justify-center items-center ">
        <script src="/js/google/map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API') }}&libraries=places&callback=initialize" async defer></script>
        <form action= "{{route('event.create.update', ['event' => $event]) }}" method="POST" enctype="multipart/form-data" class="flex flex-col justify-start container lg:px-24 space-x-2 space-y-4">
            @csrf
            @method('PUT')
            
            <h3 class="text-3xl text-gray-900 mb-2 mt-2">Edit Event</h3>
            <section id="Form" class="text-gray-900">

                <section class="flex flex-col">
                    <label for="title" class="  text-xl">Title</label>
                    @error('title')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" id='title' name='title' 
                    value="{{ old('title', $event->title) }}"
                    class="rounded-lg w-3/4  @error('title') border-red-600 bg-red-200 @enderror" >
                   
                </section>
                <section  class="flex flex-col">
                        <label for="detail" class=" text-xl">Description</label>
                        @error('detail')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <textarea id='detail' name='detail' rows="4" 
                        class="@error('detail') border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
                            {{old('detail', $event->description) }}    
                        </textarea>
                       
                </section>

                <section id="Category & Datepicker" >
                    <section id="Category" class="grid cols-span-6 w-1/3">
                        <!-- Dropdown menu -->
                    
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select an option of Category</label>
                        @error('category')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <select id="category" name="category" 
                        class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">    
                        @foreach($categorys as $category)
                                @if($event->category_id === $category->id)
                                    <option selected value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @else
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endif
                            @endforeach 


                        </select>


                    </section>

                    <!-- Event Date Time-->
                    <section id="Datepicker Start In" class="flex flex-col">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="">
                                    <label for="dateStartIn" class=" block text-xl ">
                                        StartIn
                                    </label>
                                    @error('dateStartIn')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="date" name="dateStartIn" id="dateStartIn"
                                    value="{{ old('datetimeStartIn', $event->registration_start_date ? date('Y-m-d', strtotime($event->registration_start_date)) : null) }}"
                                            class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="mb-5">
                                        <label for="time" class=" block text-xl font-medium ">
                                            <br>
                                        </label>
                                        @error('datetimeStartIn')
                                            <div class="text-red-600">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <input type="time" name="datetimeStartIn" id="datetimeStartIn"
                                    value="{{ old('datetimeStartIn', $event->registration_start_date ? date('H:i:s', strtotime($event->registration_start_date)) : null) }}"
                                    class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="Datepicker Close In" class='flex flex-col'>
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="">
                                    <label for="dateCloseIn" class="block text-xl">
                                        CloseIn
                                    </label>
                                    @error('dateCloseIn')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="date" name="dateCloseIn" id="dateCloseIn"
                                            value="{{ old('dateCloseIn', $event->registration_end_date ? date('Y-m-d', strtotime($event->registration_end_date)) : null) }}"
                                            class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="">
                                        <label for="time" class=" block text-xl font-medium ">
                                            <br>
                                        </label>
                                        @error('datetimeCloseIn')
                                            <div class="text-red-600">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <input type="time" name="datetimeCloseIn" id="datetimeCloseIn"
                                    value="{{ old('dateCloseIn', $event->registration_end_date ? date('H:i:s', strtotime($event->registration_end_date)) : null) }}"
                                    class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="Datepicker Annument date" class="flex flex-col">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <label for="Annumentdate" class="block  text-xl ">
                                        Annument date
                                    </label>
                                    @error('Annumentdate')
                                            <div class="text-red-600">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                    <input type="date" name="Annumentdate" id="Annumentdate"
                                            value="{{ old('Annumentdate', $event->announcement_date ? date('Y-m-d', strtotime($event->announcement_date)) : null) }}"
                                            class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium  outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="">
                                        <label for="datetimeAnnument" class=" block text-xl font-medium text-[#07074D]">
                                            <br>
                                        </label>
                                    @error('datetimeAnnument')
                                            <div class="text-red-600">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                    <input type="time" name="datetimeAnnument" id="datetimeAnnument"
                                            value="{{ old('Annumentdate', $event->announcement_date ? date('H:i:s', strtotime($event->announcement_date)) : null) }}"
                                            class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium   outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="Datepicker duration Event" class="flex flex-col" >
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="">
                                    <label for="startEventDate" class="block  text-xl">
                                        Start Event Date
                                    </label>
                                    @error('startEventDate')
                                            <div class="text-red-600">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                    <input type="date" name="startEventDate" id="startEventDate"
                                            value="{{ old('startEventDate', $event->event_start_date ? date('Y-m-d', strtotime($event->event_start_date)) : null) }}"
                                            class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium  outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>
                                        <div class="w-full px-3 sm:w-1/2">
                                            <div class="">
                                        <label for="endEventDate" class="block  text-xl ">
                                        End Event Date
                                        </label>
                                    @error('endEventDate')
                                            <div class="text-red-600">
                                                {{ $message }}
                                            </div>
                                    @enderror
                                    <input type="date" name="endEventDate" id="endEventDate"
                                    value="{{ old('endEventDate', $event->event_end_date ? date('Y-m-d', strtotime($event->event_end_date)) : null) }}"
                                    class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium  outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
              <section class="flex flex-col ">
                <h3 class="text-xl text-gray-900 mt-4">Image Poster</h3>
                @error('poster')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror
                <div class="flex items-center justify-center w-full my-8">
                    <img src="{{url('storage/'.$event->image_poster)}}" alt="">
                </div>
                <a></a>
                <input id="poster" name="poster" type="file" 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" /> 

              </section>

              <div class="w-full flex flex-col justify-center items-center mb-3" >
                <div class="flex flex-col justify-start items-start w-full">
                     <h3 class="text-xl font-bold text-gray-900 mt-4"  id="preview_section" style="display:none;">Image Poster Preview</h3>
                </div>
                
                     <img id="preview" src="" alt="your image" class="mt-3 mb-3 w-1/2 h-1/2 " style="display:none;"/>
                 
             </div>

                <section id="upload payment">
                    <label class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white" for="file_input">Upload Payment File</label>
                    @error('file_input')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <a href="{{url('storage/'.$event->document_payment)}}" class="text-red-500">Click to View Old Payment File</a>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                    id="file_input" type="file" name="file_input">
                    
                </section>

                <section id="upload Certificate File">
                    <label class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white" for="file_certificate">Upload Certificate File</label>
                    @error('file_certificate')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                    id="file_input" type="file" name="file_certificate">
                </section>
       
            </section>

            <section class="flex flex-col justify-center items-center gap-4">
                <label class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white" >Image Event</label>
                @foreach ( $event->eventImage as $image)
                <img src="{{url('storage/'.$image->event_image)}}" class="w-3/4 h-full object-cover" alt="">
            @endforeach

            </section>

                
            <div class="container mt-6">
                <!-- <button id="addImage" type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Add Image</button> -->
                <label class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white" for="file_input">Upload Event Images</label>
                <div id="imageContainer" class="mt-4">
                    @error('listImage')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="file" id="listImage" name="listImage[]" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <!-- Dynamically added input fields will go here -->
                </div>
                <div id="imageListPreview" class="flex flex-col justify-center items-center gap-4 mt-4">
            </div>
            
        
                      <!-- Google Map -->
                      <section id="map" class ="relative flex-col rounded-xl mt-10">
                
                        <div class="mb-6 form-group">
                            @error('location_name')
                                <div class="text-red-600">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="address-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search Location</label>
                            <input type="text" id="address-input" name="location_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control map-input" value="{{$event->location_name}}">
                            <input type="hidden" name="address_latitude" id="address-latitude" value="{{$event->event_latitude}}" />
                            <input type="hidden" name="address_longitude" id="address-longitude" value="{{$event->event_longitude}}" />
                        </div>
                      
                        <div id="address-map-container" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        </div>
                       
                    </section>  
        
                    <section  class="flex flex-col mt-2 mb-2">
                        <label for="locationDetial" class=" text-xl">Location</label>
                        @error('location_detail')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <textarea id='locationDetial' name='location_detail' rows="4" class="@error('location_detail') border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." >{{$event->location_detail}}</textarea>
                       
                    </section>
        
                    <section  class="flex flex-col mt-2 mb-2">
                        <label for="contact" class=" text-xl">Contact</label>
                        @error('contact')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <textarea id='contact' name='contact' rows="4" class="@error('location_detail') border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{$event->contact}}</textarea>
                       
                    </section>

        
            <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Update Form</button>
        </form>
        <form action="{{route('event.delete',['event' => $event])}}" enctype="multipart/form-data" method="POST" class="flex flex-col justify-start container lg:px-24 space-x-2 space-y-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="block w-full bg-red-500 text-white font-bold p-4 rounded-lg">Delete Item</button>
        </form>             
    </main>

    <script>
        
        let poster = document.getElementById("poster");

        poster.addEventListener("change", function(e){
            preview = document.getElementById('preview');
            preview.style.display = 'block';

            preview_section = document.getElementById('preview_section');
            preview_section.style.display = 'block';

            const [file] = poster.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }

            
        });

        let listImage = document.getElementById("listImage");
        let  imageListPreview = document.getElementById("imageListPreview");

        listImage.addEventListener('change',function(){
            const files = listImage.files
           
            
         
            for (let i = 0; i < files.length; i++) {
                const items = files[i];
                let imageTag = document.createElement('img');
                imageTag.src = URL.createObjectURL(items);
                imageListPreview.appendChild(imageTag);

            }


                
           
          
                
            
           
        });
    

  
    </script>

