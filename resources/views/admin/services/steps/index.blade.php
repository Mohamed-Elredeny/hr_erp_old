@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <style>
        table.dataTable {
            border-collapse: collapse !important;
        }
    </style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <h3>خطوات المرحلة</h3>
            <div class="card mt-4">
                <div class="card-body">
                    <form method="post" action="{{route('admin.updateSteps',['serviceId'=>$serviceId])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('اسم المرحلة')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" name="name" placeholder="{{__('اسم المرحلة')}}"required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('تفاصيل ')}}:</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control mb-3" name="description" ></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('Logo')}}</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="logo" id="inputGroupFile02" required>
                            </div>
                        </div>

                    

                      

                        <div class="row">
                            <button type="اضافة خطوه جديدة" class="btn btn-primary px-4 w-25 m-auto mt-3">{{__('page.Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{__('اسم الخدمه')}}</th>
                                <th>{{__('لوجو الخدمة')}}</th>
                                <th>{{__('التفاصيل')}}</th>
                                <th>{{__('page.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @foreach($services as $service)
                                <tr style="text-align: center">
                                    <td>
                                        {{$i}}
                                    </td>
                                    <td>
                                        {{$service->name}}
                                    </td>
                                    <td>
                                        {{$service->description}}
                                    </td>
                                    <td>
                                        <img src="{{asset('assets/images/' . $service->logo )}}" alt="" style="height: 90px;width:90px">
                                    </td>
                                  
                                    
                                    <td> 
                                    
                                        <div class="text-center gap-3 fs-6">
                                            

                                            <a href="javascript:;" class="text-danger" title="" data-bs-original-title="Delete" aria-label="Delete"  data-bs-toggle="modal" data-bs-target="#Delete{{$service->id}}">
                                                <ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon>
                                            </a>

                                            <div class="modal fade" id="Delete{{$service->id}}" tabindex="-1" aria-labelledby="Delete{{$service->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="Delete{{$service->id}}Label">{{__('page.Confirm_Delete')}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{__('page.Do_you_want_to_delete')}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('page.Close')}}</button>
                                                            <form method="post" action="{{route('admin.deleteSteps',['stepId'=>$service->id])}}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">{{__('page.Delete')}}</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           

                                            <div class="modal fade" id="DeletePersonalSkill{{$service->id}}" tabindex="-1"
                                                 aria-labelledby="DeletePersonalSkill{{$service->id}}Label" aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="DeletePersonalSkill{{$service->id}}Label">
                                                                {{__('page.Confirm')}} @if($service->state == 'مفعل')
                                                                    {{__('page.Ban')}}
                                                                @else
                                                                    {{__('page.Active')}}
                                                                @endif  </h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{__('page.Are_you_confirm_from')}} @if($service->state == 'مفعل')
                                                                {{__('page.Ban')}}
                                                            @else
                                                                {{__('page.Active')}}
                                                            @endif
                                                            {{__('page.this_account')}}
                                                        </div>
                                                        <div class="modal-footer">
                                                         
                                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++ ?>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                        }
                    },
                ],
                @if(LaravelLocalization::getCurrentLocale() == 'ar')

                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json',
                },
                @endif
            });
        });
    </script>
@endsection

