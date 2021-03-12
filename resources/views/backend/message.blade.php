@extends('backend.layouts.master')

@section('title')
    <title>Messages</title>
@endsection

@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
<section>
    <h2>Messages</h2>

    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($message as $item)
                    <tr style="{{ $item->status == 0 ? 'background: rgba(0, 0, 0, 0.05)':'' }}">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ substr($item->message, 0, 50) }}</td>
                        <td>
                            <a class="btn btn-primary py-1" href="{{ route('contact.show', $item->id) }}">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"> <h3>Opps.! Message not Found.</h3></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection