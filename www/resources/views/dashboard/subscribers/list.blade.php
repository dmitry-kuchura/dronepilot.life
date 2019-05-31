@extends('layouts.admin')

@section('content')
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Список подписчиков на рассылку</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Подписался</th>
                        <th><span style="width:150px;">Статус</span></th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($result))
                        @foreach($result as $obj)
                            <tr>
                                <td><span class="text-secondary">{{ $obj->id }}</span></td>
                                <td>{{ $obj->email }}</td>
                                <td>{{ date('F j, Y, g:i a', strtotime($obj->created_at)) }}</td>
                                <td><span style="width:150px;"><span
                                            class="badge-text badge-text-small {{ $obj->status !== 'active' ? 'danger' : 'success'}}">{{ $obj->status !== 'active'  ? 'Не активен' : 'Активен'}}</span></span></td>
                                <td class="td-actions">
                                    <a href="{{ route('subscribers.change-status', ['id' => $obj->id]) }}"><i class="la la-check-circle-o edit"></i></a>
                                    <a href="{{ route('subscribers.delete', ['id' => $obj->id]) }}"><i class="la la-close delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
