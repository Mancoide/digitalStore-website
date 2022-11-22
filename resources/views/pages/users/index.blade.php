@extends('layouts.admin')

@section('content')
<div class="container-fluid px-md-4 px-md-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card p-0 m-0">
				<div class="card-header p-3">
					<div class="d-flex justify-content-between">
						<h4 class="card-heading">{{ __('resources.titles.users') }}</h4>
						<a class="btn btn-outline-success btn-sm" href="{{ url('users/create') }}"><i class="fas fa-plus"></i> {{ __('resources.buttons.add') }}</a>
					</div>
				</div>
				<div class="card-body p-0">
					<table class="table table-striped card-text">
						<thead>
							<tr>
								<td>#</td>
								<td>{{ __('resources.table-titles.document') }}</td>
								<td>{{ __('resources.table-titles.name') }}</td>
								<td>{{ __('resources.table-titles.user') }}</td>
								<td>{{ __('resources.table-titles.email') }}</td>
								<td>{{ __('resources.table-titles.status') }}</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->document_number }}</td>
									<td>{{ $user->fullname }}</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->email }}</td>
									<td class="text-right">
										<span class="badge bg-{{ config('constants.status-badge.'.$user->status) }}">{{ config('constants.status.'. $user->status) }}</span>
									</td>
									<td></td>
								</tr>							
							@endforeach
						</tbody>
					</table>
					{{ $users->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection