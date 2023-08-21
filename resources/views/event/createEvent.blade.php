@extends('layouts.applicationcontrol')

@section('content')
    <script src="/js/google/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API') }}&libraries=places&callback=initialize" async defer></script>
    <main class="flex-col justify-center items-center ">
        

        <form action="{{route('event.create.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col justify-start container lg:px-24 space-x-2 space-y-4">
            @csrf
            <h3 class="text-3xl text-gray-900 mb-2 mt-2">Create Event</h3>
            <section id="Form" class="text-gray-900">

                <section class="flex flex-col">
                    <label for="title" class="  text-xl">Title</label>
                    @error('title')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" id='title' name='title' class="rounded-lg w-3/4  @error('title') border-red-600 bg-red-200 @enderror" >
                   
                </section>
                <section  class="flex flex-col">
                        <label for="detail" class=" text-xl">Description</label>
                        @error('detail')
                            <div class="text-red-600">
                                {{ $message }}
                            </div>
                        @enderror
                        <textarea id='detail' name='detail' rows="4" class="@error('detail') border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                       
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
                        <select id="category" name="category" class=" text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            
                            @foreach($categorys as $category)
                                <option > {{$category->category_name}}  </option>
                            @endforeach 
                        
                        </select>


                    </section>

                    <!-- Event Date Time-->
                    <section id="Datepicker Start In" class="flex flex-col">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="">
                                    <label for="dateStartIn" class=" block text-xl ">
                                        Start Register Date
                                    </label>
                                    @error('dateStartIn')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="date" name="dateStartIn" id="dateStartIn"
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
                                        Close Register Date
                                    </label>
                                    @error('dateCloseIn')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="date" name="dateCloseIn" id="dateCloseIn"
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
                                    class="w-full rounded-md  bg-white py-3 px-6 text-base font-medium  outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
              <section class="flex flex-col  justify-start items-start">
                <h3 class="text-xl text-gray-900 mt-4">Image Poster</h3>
                <div class="flex items-center justify-center w-full my-8">
                    <label for="poster" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)<br/>
                
                                @error('poster')
                                <div class="text-red-600">
                                    {{ $message }}
                                </div>
                            @enderror
                            </p>
                        </div>
                        <input id="poster" name="poster" type="file" class="hidden" />
                    </label>
                </div> 


         
                

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
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                    id="file_input" type="file" name="file_input">
                </section>
        
            </section>
                
            <div class="container mt-6">
                <!-- <button id="addImage" type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Add Image</button> -->
                <label class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white" for="listImage">Upload Event Images</label>
                <div  class="mt-4">
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
            </div>
            <!-- upload Certificate File -->
            <section id="upload Certificate File">
                    <label class="block mb-2 text-2xl font-medium text-gray-900 dark:text-white" for="file_certificate">Upload Certificate File</label>
                    @error('file_certificate')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" 
                    id="file_certificate" type="file" name="file_certificate">
            </section>
            
        
            <!-- Google Map -->
            <section id="map" class ="relative flex-col rounded-xl mt-10">
                
                <div class="mb-6 form-group">
                    @error('location_name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="address-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Search Location</label>
                    <input type="text" id="address-input" name="location_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 form-control map-input">
                    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                </div>
              
                <div id="address-map-container" style="width:100%;height:400px; ">
                    <div style="width: 100%; height: 100%" id="address-map"></div>
                </div>
               
            </section>  

            <section  class="flex flex-col">
                <label for="locationDetial" class=" text-xl">Location</label>
                @error('location_detail')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror
                <textarea id='locationDetial' name='location_detail' rows="4" class="@error('location_detail') border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
               
            </section>

            <section  class="flex flex-col">
                <label for="contact" class=" text-xl">Contact</label>
                @error('contact')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                @enderror
                <textarea id='contact' name='contact' rows="4" class="@error('location_detail') border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
               
            </section>


        
            <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>


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



@endsection   


  