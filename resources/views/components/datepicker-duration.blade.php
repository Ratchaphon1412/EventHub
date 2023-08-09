<div class="-mx-3 flex flex-wrap">
    <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
            <label for="date" class="mb-3 block text-base text-xl text-[#07074D]">
                {{ $slot }}
            </label>
             <input type="date" name="date" id="date"
                     class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>
</div>