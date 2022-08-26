@props(['toefl'])

<article class="card flex flex-col">
    <img class="h-32 w-full object-cover" src="{{"/img/toefl.jpg"}}" alt="">
    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title">{{ Str::limit($toefl->name,25)}}</h1>

    <a href="{{Route('toefl.evaluation.status',$toefl)}}" class="btn btn-danger btn-block mt-4">Continuar al exámen</a>
    </div>
</article>