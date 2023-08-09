@extends('layouts.applicationcontrol')

@section('content')
    <main class="flex-col justify-center items-center ">
        <form action="{{route('event.create.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <section id="coverImage" class="relative h-auto w-auto overflow-hidden bg-cover bg-no-repeat">
            <div class="flex justify-center items-center bg-black h-64 opacity-80 w-full rounded-lg">
                <div class="flex-col">
                    @error('poster')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <!-- @livewire('upload-photo') -->
                    <input id="poster" type="file" name="poster" 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
                    <!-- <button type="button" id="poster" name="poster" class="hover:opacity-60 bg-[url('https://png.pngtree.com/element_our/sm/20180516/sm_5afbe35ff3ec9.jpg')] "> -->
                        <!-- <input type="file" id="poster" name="poster" class="bg-[url('https://png.pngtree.com/element_our/sm/20180516/sm_5afbe35ff3ec9.jpg')] "> -->
                        <!-- <img src="https://png.pngtree.com/element_our/sm/20180516/sm_5afbe35ff3ec9.jpg" alt="Avatar" 
                        class="w-16 h-16 rounded-lg mr-2 bg-black object-cover">  -->
                    </button>
                </div>
            </div>
        </section>
        <section id="Form" class="grid grid-6 md:grid-cols-1">

            <section id="Title" class="">
                <section id="Title" class="grid  mt-10 items-start">
                    <label for="title" class=" justify-start pb-1 text-xl">Title</label>
                    @error('title')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" id='title' name='title' class="rounded-lg w-3/4 mx-5 @error('title') border-red-600 bg-red-200 @enderror" >
                </section>
            </section>
            <section id="Description" class="grid col-span-full mt-10 w-full items-start">
                    <label for="detail" class=" justify-start pb-1 text-xl">Description</label>
                    @error('detail')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" id='detail' name='detail' class="rounded-lg  @error('detail') border-red-600 bg-red-200 @enderror w-3/4 h-20 mx-5">
            </section>

            <section id="Category & Datepicker" class="">
                <section id="Category" class="grid cols-span-6 w-1/3">
                    <!-- Dropdown menu -->
                    <label data-te-select-label-ref for='category'class="justify-start pb-1 text-xl mt-10">Category</label>
                    @error('category')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                    <select data-te-select-init id='category' name="category" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                    @foreach($categorys as $category)
                        <option id="category"> {{$category->category_name}}  </option>
                    @endforeach 
                    </select>
                </section>

                <!-- Event Date Time-->
                <section id="Datepicker Start In" class='grid cols-span-6 mt-6'>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="dateStartIn" class="mb-3 block text-base text-xl text-[#07074D]">
                                    StartIn
                                </label>
                                @error('dateStartIn')
                                    <div class="text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="date" name="dateStartIn" id="dateStartIn"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                </div>
                                    <div class="w-full px-3 sm:w-1/2">
                                        <div class="mb-5">
                                    <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                        <br>
                                    </label>
                                    @error('datetimeStartIn')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <input type="time" name="datetimeStartIn" id="datetimeStartIn"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                </section>
                <section id="Datepicker Close In" class='grid cols-span-6 mt-6'>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="dateCloseIn" class="mb-3 block text-base text-xl text-[#07074D]">
                                    CloseIn
                                </label>
                                @error('dateCloseIn')
                                    <div class="text-red-600">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="date" name="dateCloseIn" id="dateCloseIn"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                </div>
                                    <div class="w-full px-3 sm:w-1/2">
                                        <div class="mb-5">
                                    <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                                        <br>
                                    </label>
                                    @error('datetimeCloseIn')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <input type="time" name="datetimeCloseIn" id="datetimeCloseIn"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                </section>

                <section id="Datepicker Annument date" class="grid cols-span-6 mt-6">
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="Annumentdate" class="mb-3 block text-base text-xl text-[#07074D]">
                                    Annument date
                                </label>
                                @error('Annumentdate')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                 @enderror
                                <input type="date" name="Annumentdate" id="Annumentdate"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                </div>
                                    <div class="w-full px-3 sm:w-1/2">
                                        <div class="mb-5">
                                    <label for="datetimeAnnument" class="mb-3 block text-base font-medium text-[#07074D]">
                                        <br>
                                    </label>
                                @error('datetimeAnnument')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                 @enderror
                                <input type="time" name="datetimeAnnument" id="datetimeAnnument"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                </section>

                <section id="Datepicker duration Event" class="grid cols-span-6 mt-6" >
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="startEventDate" class="mb-3 block text-base text-xl text-[#07074D]">
                                    Start Event Date
                                </label>
                                @error('startEventDate')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                 @enderror
                                <input type="date" name="startEventDate" id="startEventDate"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                                </div>
                                    <div class="w-full px-3 sm:w-1/2">
                                        <div class="mb-5">
                                    <label for="endEventDate" class="mb-3 block text-base  text-xl text-[#07074D]">
                                    End Event Date
                                    </label>
                                @error('endEventDate')
                                        <div class="text-red-600">
                                            {{ $message }}
                                        </div>
                                 @enderror
                                <input type="date" name="endEventDate" id="endEventDate"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                </section>
            </section>
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
        <!-- dynamic_fields.blade.php -->
        <!-- <section id="AddMember">
            <div class="container  mt-6">
                <button id="addMember" type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Add Member</button>
                <div id="inputContainer" class="mt-4"> -->
                    <!-- Dynamically added input fields will go here -->
                <!-- </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                const addInputBtn = document.getElementById('addMember');
                const inputContainer = document.getElementById('inputContainer');
                let fieldCounter = 0;

                addInputBtn.addEventListener('click', function () {
                    const inputField = document.createElement('input');
                    inputField.setAttribute('type', 'text');
                    inputField.setAttribute('name', `input_${fieldCounter}`);
                    inputField.setAttribute('class', 'block w-full mt-2 p-2 border rounded');
    

                    const removeBtn = document.createElement('button');
                    removeBtn.textContent = 'Remove';
                    removeBtn.setAttribute('class', 'mt-2 px-4 py-2 bg-red-500 text-white rounded');

                    removeBtn.addEventListener('click', function () {
                        inputField.remove();
                        removeBtn.remove();
                    });

                    inputContainer.appendChild(inputField);
                    inputContainer.appendChild(removeBtn);

                    fieldCounter++;
                    });
                });
            </script> -->
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
                    <input type="file" name="listImage" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <!-- Dynamically added input fields will go here -->
                </div>
            </div>
            <!-- <script>
                document.addEventListener('DOMContentLoaded', function () {
                const addImageBtn = document.getElementById('addImage');
                const imageContainer = document.getElementById('imageContainer');
                let imageFieldCounter = 0;

                addImageBtn.addEventListener('click', function () {
                    const imageFieldWrapper = document.createElement('div');
                    imageFieldWrapper.classList.add('mt-4');

                    const imageField = document.createElement('input');
                    imageField.setAttribute('type', 'file');
                    imageField.setAttribute('name', `image_${imageFieldCounter}`);
                    imageField.setAttribute('class', 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400');
                    imageField.setAttribute('mutiple');
                    
                    const removeBtn = document.createElement('button');
                    removeBtn.textContent = 'Remove';
                    removeBtn.setAttribute('class', 'mt-2 px-4 py-2 bg-red-500 text-white rounded');

                    removeBtn.addEventListener('click', function () {
                        imageFieldWrapper.remove();
                    });

                    imageFieldWrapper.appendChild(imageField);
                    imageFieldWrapper.appendChild(removeBtn);

                    imageContainer.appendChild(imageFieldWrapper);

                    imageFieldCounter++;
                    });
                });
            </script> -->
        <section>

        </section>


        <!-- <section id="Add Dynamic Input member" class="flex-col mt-10 flex w-full mb-10">
                <div id="Add member" class="w-full p-5  flex justify-between max-width-4xl bg-white rounded-xl drop-shadow-md border-b-2 border-solid border-black">
                    <h1 class="text-xl ">Add member</h1>
                    <a href="#"id="addMember" class="text-4xl flex justify-center items-center inline-block w-10 h-10 bg-[#8bc34a] rounded-xl">&plus;</a>
                </div>
                <div id="memberList">

                </div>
            <script>
                    const addButton = document.querySelector("addMember")
                    const input = document.querySelector("memberList")

                    function addInput(){
                        const member = document.createElement("input");
                        name.type="member";
                        email.placeholder="Enter Your username";

                        const email = document.createElement("input");
                        email.type="email";
                        email.placeholder="Enter Your email";
                        
                        const btn=document.createElement("a");
                        btn.className = "delete";
                        btn.innerHTML = "&times";

                        const flex=document.createElement("div");
                        flex.class = "flex";
                    }
            </script> -->
        </section>  
            <!-- Google Map -->
        <section id="map" class ="relative flex-col rounded-xl mt-10">
           <label class="flex-inline text-xl xl-60 w-full">Location Map</label>
            <div class="relative flex justify-center  rounded-xl p-10">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15495.430065221823!2d100.55934052016653!3d13.84759001989712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29d1e111be769%3A0x4332e8cd6aec8c31!2sKasetsart%20University!5e0!3m2!1sen!2sth!4v1690953595631!5m2!1sen!2sth" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>  

        </section>
        <button type="submit" class="block w-full bg-blue-500 text-white font-bold p-4 rounded-lg">Submit</button>


        </form>

    </main>

@endsection   
