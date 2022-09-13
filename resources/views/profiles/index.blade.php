@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h2>{{$user->name}} </h2></div>
        <div class="col"><a href="{{route('student.edit',$user->student)}}">{{__('Edit')}}</a></div>
    </div>

    <div class="row">
        <div class="col">{{$user->student->profile->major}}<br></div>
        <div class="col"><a href="{{route('profile.edit',$user->student->profile)}}">{{__('Edit')}}</a></div>
    </div>

    <div class="row">
        <div class="col">{{__('GPA').': '.$user->student->profile->gpa}}</div>
        <div class="col"><a href="{{route('profile.edit',$user->student->profile)}}">{{__('Edit')}}</a></div>
    </div>

    <hr>
    <div class="row">
        <h4 class="col">{{__('Bio')}}</h4>
        <div class="col"><a href="{{route('profile.edit',$user->student->profile)}}">{{__('Edit')}}</a></div>
    </div>

    <p>
        {{$user->student->profile->bio}}
    </p>
    <div class="row">
        <h4 class="col">{{__('Skills')}}</h4>
        <a class="col" href="{{route('skills.create')}}">{{__('Add')}}</a>

    </div>
    <hr>
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
    <hr>
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

            {{__('Position')}}: {{$experience->position}}<br>
            <small>{{__('From')}}: {{date_format(date_create($experience->start),"d/m/Y")}} {{__('To')}}: {{($experience->end!=null)?date_format(date_create($experience->end),"d/m/Y"):__("Now")}}</small>
            <br>
            <p>{{__('Description')}}: {{$experience->description}}</p>

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
    <hr>
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

                    <small>{{__('From')}}: {{date_format(date_create($project->start),"d/m/Y")}} {{__('To')}}: {{date_format(date_create($project->end),"d/m/Y")}}</small>
                    <br>
                    <p>{{__('Description')}}: {{$project->description}}</p>
                    {{__('URL')}}: <a href="{{$project->url}}" target="_blank">{{$project->name}}</a>

                </li>
            @endforeach
        </ul>
    @else
        <p>No Experiences added</p>
    @endif
    <div class="row">
        <h4 class="col">{{__('Certifications')}}</h4>
        <a class="col" href="{{route('certifications.create')}}">{{__('Add')}}</a>

    </div>
    <hr>
    @if(count($certifications=$user->student->profile->certifications))
        <ul>
            @foreach($certifications as $certification)
                <li>
                    <div class="row">
                        <h5 class="col">{{$certification->name}}</h5>
                        <div class="col">
                            <a href="{{route('certifications.edit',$certification)}}">{{__('Edit')}}</a>
                        </div>
                    </div>

                    <small>{{__('Issued by')}}: {{$certification->issuer}}</small><br>
                    <small>{{__('Date')}}: {{date_format(date_create($certification->date),"d/m/Y")}} </small>
                    <br>
                    <p>{{__('Description')}}: {{$certification->description}}</p>
                    {{__('URL')}}: <a href="{{$certification->url}}" target="_blank">{{$certification->name}}</a>

                </li>
            @endforeach
        </ul>
    @else
        <p>No Certifications added</p>
    @endif

    <div class="row">
        <h4 class="col">{{__('Languages')}}</h4>
        <a class="col" href="{{route('languages.create')}}">{{__('Add')}}</a>

    </div>
    <hr>
    @if(count($languages=$user->student->profile->languages))
        <p>
        <div class="row">
            @foreach($languages as $language)

                    <div class="col-6">

                        <li>{{$language->language}}</li>

                        <span>{{__($language->level)}}</span>
                    </div>
                    <div class="col-6">
                        <form action="{{route('languages.destroy', $language)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn bg-transparent text-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>

            @endforeach
        </div>
        </p>
    @else
        <p>No languages added</p>
    @endif

    <div class="row">
        <h4 class="col">{{__('Contacts')}}</h4>
        <a class="col" href="{{route('contacts.create')}}">{{__('Add')}}</a>

    </div>
    <hr>
    @if(count($contacts=$user->student->profile->contacts))
        <p>
        <div class="row">
            @foreach($contacts as $contact)

                <div class="col-6">
                    @if($contact->type == 'url')
                        <?php
                        $domain = parse_url($contact->contact);
                        ?>
                        <li><a href="{{$contact->contact}}" target="_blank">{{$domain['host']}}</a></li>
                    @elseif($contact->type == 'tel')
                        <li>
                            <a href="tel:{{$contact->contact}}" target="_blank">
                                {{substr($contact->contact,0,3)}}-{{substr($contact->contact,3,3)}}-{{substr($contact->contact,6,4)}}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="mailto:{{$contact->contact}}">{{$contact->contact}}</a>
                        </li>
                    @endif

                </div>
                <div class="col-6">
                    <form action="{{route('contacts.destroy', $contact)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-transparent text-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </div>

            @endforeach
        </div>
        </p>
    @else
        <p>No contacts added</p>
    @endif

</div>




@endsection
