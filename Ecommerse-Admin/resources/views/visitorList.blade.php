@extends('Layout.app')
@section('content')

    @include('Component.LoadingDiv')
    @include('Component.WentWrongDiv')

    <div id="MainDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 data-table-card col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="SiteDataTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>IP Address</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody id="SiteDataTableBody">
                    </tbody>

                </table>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection

@section('script')


    <script>

        DataList()
        function DataList(){
            let URL="/VisitorListData";
            axios.get(URL).then(function (response) {
                if(response.status==200){
                    $('#LoadingDiv').addClass('d-none');
                    $('#MainDiv').removeClass('d-none')
                    $('#SiteDataTable').DataTable().destroy();
                    $('#SiteDataTableBody').empty();
                    $.each(response.data,function (i,item){
                        let tableRow="<tr>" +
                            "<td>"+item['ip_address']+"</td>" +
                            "<td>"+item['visit_time']+"</td>" +
                            "<td>"+item['visit_date']+"</td>" +
                            "</tr>";
                        $('#SiteDataTableBody').append(tableRow);
                    });
                    $('#SiteDataTable').DataTable({
                        "order":false,
                        "lengthMenu": [5, 10, 20, 50]
                    });
                    $('.dataTables_length').addClass('bs-select');
                }
                else{
                    $('#LoadingDiv').addClass('d-none')
                    $('#WentWrongDiv').removeClass('d-none')
                }

            }).catch(function (error) {
                $('#LoadingDiv').addClass('d-none')
                $('#WentWrongDiv').removeClass('d-none')
            });
        }

    </script>

@endsection


