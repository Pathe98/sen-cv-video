@extends('components.navbar')


@section('content')
    <div class="m-5 row text-center d-flex align-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary b-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Commencer votre Post
                </button>

                <!-- Modal -->
                <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Partage CV video</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Description de votre post</label>
                                            <input type="text" name="content" class="form-control" rows="3" cols="3">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Choisissez une video</label>
                                            <input type="file" name="video">
                                        </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Publier</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            
            <div class="d-flex align-items-center justify-content-center flex-direction-column my-4">
                <div class="card text-center" style="width:40%;margin-bottom:20px">
                @foreach ($posts as $post)
                    <div class="card-header">
                        @if($post->author->image)
                            <img src="{{ asset('storage/' . $post->author->image) }}" alt="Photo de profil" style="width:60px; height: 60px; border-radius:50%">
                        @else
                            <!-- Ajoutez une image par défaut ou un texte alternatif si l'image n'est pas présente -->
                            <div style="width: 60px; height: 60px; background-color: #ccc; border-radius: 50%;"></div>
                        @endif
                        <strong>{{$post->author->prenom}} {{$post->author->nom}}</strong>
                    </div>
                    <div class="card-body row">
                        <p class="lead text-start">
                            {{ $post->content }}
                        </p>
                        @if($post->video)
                            <video width="720" height="420" controls class="py-2">
                                <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                                Video non pris en charge
                            </video>
                        @endif
                    </div>
                    <div class="card-footer text-body-secondary row">
                        <button type="button" class="btn btn-light w-50 rounded-0" style="color:#444D57">
                        <div class="d-flex align-items-center " style="margin-top: -20px;">
                        <form action="{{ route('posts.like') }}" method="post" id="form-js">
                            <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="btn btn-link btn-sm">
                            </a>
                            <p id="count-js" class="mb-0"><i class="fa fa-heart"></i> {{ $post->likes->count() }}  like        </p>
                        <input type="hidden" id="post-id-js" value="{{ $post->id }}">
                        </form>
                        </div>
                                            
                        </button>
                        <button type="button" class="btn btn-light w-50 rounded-0" style="color:#5E5E5E">
                            Commenter<i class="bi bi-eye-fill"></i>
                            <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' viewBox="0 0 24 24">
                                <title>message_1_line</title>
                                <g id="message_1_line" fill='none' fill-rule='nonzero'>
                                    <path
                                        d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z' />
                                    <path fill='#5E5E5EFF'
                                        d='M19 3a3 3 0 0 1 2.995 2.824L22 6v10a3 3 0 0 1-2.824 2.995L19 19h-3.697l-2.61 1.74a1.25 1.25 0 0 1-1.257.075l-.13-.075L8.698 19H5a3 3 0 0 1-2.995-2.824L2 16V6a3 3 0 0 1 2.824-2.995L5 3h14Zm0 2H5a1 1 0 0 0-.993.883L4 6v10a1 1 0 0 0 .883.993L5 17h3.697a2 2 0 0 1 .965.248l.145.088L12 18.798l2.193-1.462a2 2 0 0 1 .941-.329l.169-.007H19a1 1 0 0 0 .993-.883L20 16V6a1 1 0 0 0-.883-.993L19 5ZM8.5 10a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm7 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z' />
                                </g>
                            </svg>
                        </button>
                        @endforeach
                    </div>
            </div>

                <script >

    const forms = document.querySelectorAll('#form-js');

    forms.forEach(form => {
    form.addEventListener('click', function (e) {
        e.preventDefault();

        const url = this.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const postId = this.querySelector("#post-id-js").value;
        const count = this.querySelector('#count-js');

        fetch(url, {
            headers: {
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            body: JSON.stringify({
                id: postId
            })
        })
        .then(response => response.json())
        .then(data => {
            count.innerHTML =`<i class="fa fa-heart"></i> ${data.count} Like`       
         })
        .catch(error => {
            console.log(error);
        });
    });
    });
</script>

             


@endsection
