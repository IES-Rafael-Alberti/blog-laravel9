<div class="flex items-center" x-data="picturePreview()">
  <div class="rounded-md bg-gray-200 mr-2">
    <img id="preview" src="" alt="" class="w-24 h-24 rounded-md object-cover">
  </div>
  <div>
    <x-primary-button @click="document.getElementById('avatar').click()" class="relative">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
        </svg>
        Subir imagen
      </div>
      <input @change="showPreview(event)" type="file" name="avatar" id="avatar" class="absolute inset-0 -z-10 opacity-0">
    </x-primary-button>
  </div>
  <script>
    function picturePreview() {
      return {
        showPreview: (event) => {
          if (event.target.files.length > 0)
            var src = URL.createObjectURL(event.target.files[0]);
          document.getElementById('preview').src = src;
        }
      }
    }
  </script>
</div>
