@extends('admin.layout', ['activePage' => 'Email'])
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default shadow-sm">
                <div class="card-header card-header-border-bottom">
                    <h2>Subscribed Email</h2>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($emails as $email)
                                <tr>
                                    <td>{{$email->id}}</td>
                                    <td>{{$email->email}}</td>
                                    <td>
                                        {!! Form::open(['url' => 'admin/email/'. $email->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan='5'>No records Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $emails->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection