<div class="text-center font-semibold text-black">
    {{ __($title) }}
</div>
<form class="mt-8 " action="{{ $route }}" method="post" enctype="multipart/form-data">
    @csrf
    @isset($contact)
        @method('PUT')
    @endisset
    <div class="mx-auto w-2/3">
        <div class="py-1">
            <span class="px-1 text-sm text-gray-600">
                {{ __('Title') }}
            </span>
            
            <input type="text" name="title" onchange="mostrarImagen(event)" accept="image/*"
                @isset($contact) value="{{ $contact->title }}" @endisset
                class="text-md block px-3 py-2 rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
            @error('title')
                <div class="text-xs text-red-500 mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="py-1">
            <span class="px-1 text-sm text-gray-600">
                {{ __('Music') }}
            </span>
            <div class="flex justify-between items-center gap-2">
                <script>
                    function mostrarAudio(event) {
                      var archivo = event.target.files[0];
                      var reader = new FileReader();
                      
                      reader.onload = function(e) {
                        var audio = document.getElementById("audio");
                        audio.src = e.target.result;
                        audio.style.display = "block";
                      };
                      
                      reader.readAsDataURL(archivo);
                    }
                </script>
                <audio id="audio" controls class="w-2/3"><source
                    @isset($contact)
                             src="{{ $contact->getUrlp() }}" 
                    @endisset type="audio/mpeg">
                </audio> 
                <input type="file" name="path" onchange="mostrarAudio(event)" accept="audio/mp3"
                    class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
            </div>
            @error('path')
                <div class="text-xs text-red-500 mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="py-1">
            <span class="px-1 text-sm text-gray-600">
                {{ __('Image') }}
            </span>
            <div class="flex justify-between items-center gap-2">
                <script>
                    function mostrarImagen(event) {
                      var archivo = event.target.files[0];
                      var reader = new FileReader();
                      
                      reader.onload = function(e) {
                        var imagen = document.getElementById("imagen");
                        imagen.src = e.target.result;
                      };
                      
                      reader.readAsDataURL(archivo);
                    }
                </script>
                <img id="imagen" class="w-12 h-13 rounded-full" 
                @isset($contact)
                    src="{{ $contact->getUrli() }}"
                @endisset>
                <input type="file" name="image" onchange="mostrarImagen(event)" accept="image/*"
                    class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
            </div>
            @error('image')
                <div class="text-xs text-red-500 mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit"
            class="mt-3 text-lg font-semibold
            bg-gray-800 w-full text-white rounded-lg
            px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
            {{ __($button) }}
        </button>
    </div>
</form>
