@extends('app')

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#create-news">
        <i class="fa fa-newspaper-o"></i> Ajouter
    </button>

    <div class="modal fade" id="create-news" tabindex="-1" role="dialog"
         aria-labelledby="newsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newsLabel">
                        Ajouter Une Nouvelle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('create.news')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('admin-form-inputs', ['checkbox' => true])
                        <button type="submit" class="btn btn-primary"><i
                                    class="fa fa-newspaper-o"></i> {{__('Ajouter')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>

    @if(count($news))
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Modifier</th>
                <th scope="col">Effacer</th>
            </tr>
            </thead>
            <tbody>

            @foreach($news as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#edit-news-{{$n->id}}">
                            <i class="fa fa-edit"></i>
                        </button>

                        <div class="modal fade" id="edit-news-{{$n->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="newsLabel-{{$n->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newsLabel-{{$n->id}}">
                                            Modification: {{ $n->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('update.news', $n->id)}}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            @include('admin-form-inputs')
                                            <button type="submit" class="btn btn-primary"><i
                                                        class="fa fa-edit"></i> {{__('Modifier')}}</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete-news-{{$n->id}}">
                            <i class="fa fa-trash"></i>
                        </button>

                        <div class="modal fade" id="delete-news-{{$n->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="newsLabel-{{$n->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newsLabel-{{$n->id}}">Vérification de
                                            suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">
                                                    Annuler
                                                </button>
                                            </div>
                                            <div class="col">
                                                <form class="form-inline"
                                                      action="{{route('delete.news', $n->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-block btn-danger">Oui, Effacer!</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $news->links() }}
    @else
        <h3>There are no news right now.</h3>
    @endif
@endsection
