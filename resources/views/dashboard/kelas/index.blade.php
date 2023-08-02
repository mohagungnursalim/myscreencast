<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas') }}
        </h2>

        @section('judul')
        Kelas
        @endsection
    </x-slot>





    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- konten kelas here --}}

                    {{-- Alert success --}}
                    @if ($message = Session::get('success'))

                    <div class="alert text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell"></i>
                        </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Success</b> {{ $message }}
                        </span>
                        <button
                            class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                            onclick="closeAlert(event)">
                            <span>×</span>

                        </button>
                    </div>
                    @endif


                    <!-- Button trigger modal -->
                    <button
                        class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mb-2">Buat
                        Kelas</button>

                    {{-- Paginate --}}
                    {{ $kelas->links() }}
                    <div class="flex flex-col ">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto mb-3">

                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full text-left text-sm font-light">
                                                        <thead class="border-b font-medium dark:border-neutral-500">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-4">#</th>
                                                                <th scope="col" class="px-6 py-4">Judul</th>
                                                                <th scope="col" class="px-6 py-4">Thumbnail</th>
                                                                <th scope="col" class="px-6 py-4">Deskripsi</th>
                                                                <th scope="col" class="px-6 py-4">Dibuat</th>
                                                                <th scope="col" class="px-6 py-4">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="font-normal">
                                                            @if($kelas->count())
                                                            @foreach ($kelas as $kls )
                                                            <tr
                                                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                <td class="px-6 py-4 font-medium">
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td class="px-6 py-4 ">
                                                                    {{ $kls->judul }}
                                                                </td>

                                                                <td class="px-6 py-4">
                                                                    <img width="140px" class=""
                                                                        src="{{ asset('storage/' .$kls->thumbnail) }}"
                                                                        alt="{{ $kls->judul }}">
                                                                </td>
                                                                <td class="px-6 py-4 ">
                                                                    {{ $kls->deskripsi }}
                                                                </td>
                                                                <td class="whitespace-nowrap px-6 py-4">
                                                                    {{ $kls->created_at->format('d-M,Y') }}
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <button>hapus</button></td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td class="whitespace-nowrap px-6 py-4 text-center"
                                                                    colspan="5">Tidak ada data..</td>
                                                            </tr>
                                                            @endif

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ $kelas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>


<!--Modal-->
<div id="modal-input"
    class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div
            class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
            <span class="text-sm">(Esc)</span>
        </div>

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Buat Kelas</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>

            <!--Body-->

            <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                    <input type="text" name="judul"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan judul..">

                        @error('judul')
                        <p class="text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                  </div>
                        
                
                <div class="mb-3">

                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Masukan deskripsi.."></textarea>

                        @error('deskripsi')
                        <p class="text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="file"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thumbnail</label>


                    <img width="140px" class="h-auto max-w-lg mx-auto img-preview" src="" alt="Tidak ada image">

                    <input type="file" onchange="previewImage()" id="image" name="thumbnail"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('thumbnail')
                        <p class="text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                <div class="flex flex-col items-center">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                </div>
            </form>


            <!--Footer-->
            {{-- <div class="flex justify-end pt-2">
                <button
                    class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Action</button>
                <button
                    class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
            </div> --}}

        </div>
    </div>
</div>

{{-- hide alert exit button --}}
<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }

</script>
{{-- <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 2000);
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the alert element
        const alertElement = document.querySelector(".alert");

        // Show the alert initially (optional)
        alertElement.style.display = "block";

        // Hide the alert after a certain time (e.g., 5 seconds)
        setTimeout(function () {
            alertElement.style.display = "none";
            // If you want to completely remove the alert element from the DOM:
            // alertElement.remove();
        }, 2000);
    });

</script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Jika ada error,tampilkan kembali modal --}}
@if ($errors->any())
<script>
     var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function (event) {
            event.preventDefault()
            toggleModal()
        })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function (evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };


    function toggleModal() {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }


    // Menampilkan modal secara otomatis ketika halaman dimuat
    window.onload = function () {
        toggleModal();
    };

</script>

@endif

{{-- Show Input Modal --}}
<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function (event) {
            event.preventDefault()
            toggleModal()
        })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function (evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };


    function toggleModal() {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
    }

</script>

{{-- input image preview --}}
<script>
    function previewImage() {

        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {

            imgPreview.src = oFREvent.target.result;

        }
    }

</script>
