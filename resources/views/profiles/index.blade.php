@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{$user->name}} </h2>
    {{$user->student->profile->major}}<br>
    {{__('GPA: ').$user->student->profile->gpa}}
    <hr>
    <h4>{{__('Bio')}}</h4>
    <p>
        {{$user->student->profile->bio}}
    </p>
    <div class="row">
        <h4 class="col">{{__('Skills')}}</h4>
        <a class="col" href="{{route('skills.create')}}">{{__('Add')}}</a>

    </div>
    @if(count($skills=$user->student->profile->skills))
    <p>
        <ul>
            @foreach($skills as $skill)
                <div class="row">
                    <li class="col">{{$skill->skill}}</li>
                    <div class="col">
                        <form action="{{route('skills.destroy', $skill)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-transparent text-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </ul>
    </p>
    @else
        <p>No skills added</p>
    @endif
    <div class="row">
        <h4 class="col">{{__('Experiences')}}</h4>
        <a class="col" href="{{route('experiences.create')}}">{{__('Add')}}</a>

    </div>
    @if(count($experiences=$user->student->profile->experiences))
    <ul>
        @foreach($experiences as $experience)
        <li>
            <div class="row">
                <h5 class="col">{{$experience->company}}</h5>
                <div class="col">
                    <a href="{{route('experiences.edit',$experience)}}">{{__('Edit')}}</a>
                </div>
            </div>

            Position: {{$experience->position}}<br>
            <small>From: {{date_format(date_create($experience->start),"d/m/Y")}} to: {{($experience->end!=null)?date_format(date_create($experience->end),"d/m/Y"):"Now"}}</small>
            <br>
            <p>Description: {{$experience->description}}</p>

        </li>
        @endforeach
    </ul>
    @else
        <p>No Experiences added</p>
    @endif
    <div class="row">
        <h4 class="col">{{__('Projects')}}</h4>
        <a class="col" href="{{route('projects.create')}}">{{__('Add')}}</a>

    </div>
    @if(count($projects=$user->student->profile->projects))
        <ul>
            @foreach($projects as $project)
                <li>
                    <div class="row">
                        <h5 class="col">{{$project->name}}</h5>
                        <div class="col">
                            <a href="{{route('projects.edit',$project)}}">{{__('Edit')}}</a>
                        </div>
                    </div>

                    <small>From: {{date_format(date_create($project->start),"d/m/Y")}} To: {{date_format(date_create($project->end),"d/m/Y")}}</small>
                    <br>
                    <p>Description: {{$project->description}}</p>
                    URL: <a href="{{$project->url}}">{{$project->name}}</a>

                </li>
            @endforeach
        </ul>
    @else
        <p>No Experiences added</p>
    @endif
    <div class="row">



    </div>

</div>




@endsection
