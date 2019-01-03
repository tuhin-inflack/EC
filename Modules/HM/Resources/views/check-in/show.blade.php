@extends('hm::layouts.master')
@section('title', 'Check In Details')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Check In Details</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div id="PrintCheckIn" class="card-body" style="padding-left: 20px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><span class="text-bold-600">Booking Information</span></p>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">Request ID</td>
                                                <td class="width-300">BARDXXXXXX</td>
                                            </tr>
                                            <tr>
                                                <td>Requested On</td>
                                                <td>03-12-2018</td>
                                            </tr>
                                            <tr>
                                                <td>Booked By</td>
                                                <td>Hasib Noor</td>
                                            </tr>
                                            <tr>
                                                <td>Organization</td>
                                                <td>Inflack Limited</td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td>Manageing Director</td>
                                            </tr>
                                            <tr>
                                                <td>Organization Type</td>
                                                <td>Private</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>xxxxxxxxxxx</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>hasib@inflack.com</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>Dhaka</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">BARD Reference</td>
                                                <td class="width-300">Employee Name</td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td>Designation</td>
                                            </tr>
                                            <tr>
                                                <td>Department</td>
                                                <td>Department</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>xxxxxxxxxxx</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p><span class="text-bold-600">Check In Information</span></p>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <tbody>
                                            <tr>
                                                <td class="width-150">Request ID</td>
                                                <td class="width-300">BARDXXXXXX</td>
                                            </tr>
                                            <tr>
                                                <td>Booking Type</td>
                                                <td>Single</td>
                                            </tr>
                                            <tr>
                                                <td>Check In</td>
                                                <td>03-12-2018</td>
                                            </tr>
                                            <tr>
                                                <td>Check Out</td>
                                                <td>03-12-2018</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Guest</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>No. of Room</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>Room Details</td>
                                                <td>2 (AC)</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>

                                    <p><span class="text-bold-600">Guest Information</span></p>
                                    <div class="table-responsive">
                                        <table class="table table-responsive table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Organization</th>
                                                <th class="hideDocument">Document</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Saib Bin Ron</td>
                                                <td>xxxxxxxxxxxx</td>
                                                <td>Inflack Limited</td>
                                                <td class="hideDocument"><a href="javascript:;">File</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Sumon Siddik</td>
                                                <td>xxxxxxxxxxxx</td>
                                                <td>Inflack Limited</td>
                                                <td class="hideDocument"><a href="javascript:;">File</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('page-js')

    <script>
        $(document).ready(function () {
            $('#PrintCommand').on('click', function () {
                printContent('PrintCheckIn', '', '');
            });

            var printContent = function (id, division, report_type) {
                var table = document.getElementById(id).innerHTML;
                newwin = window.open('', 'printwin', 'left=70,top=70,width=500,height=500');
                newwin.document.write(' <html>\n <head>\n');

                @php
                    $data = "'" .

                        '\t<link rel="stylesheet" type="text/css" href="' . asset('css/app.css') . '"/>\n' . "'";
                @endphp
                newwin.document.write(<?php echo $data ?>);
                newwin.document.write('<title></title>\n');
                newwin.document.write(' <script>\n');
                newwin.document.write('function chkstate(){\n');
                newwin.document.write('if(document.readyState=="complete"){\n');
                newwin.document.write('window.close()\n');
                newwin.document.write('}\n');
                newwin.document.write('else{\n');
                newwin.document.write('setTimeout("chkstate()",2000)\n');
                newwin.document.write('}\n');
                newwin.document.write('}\n');
                newwin.document.write('function print_win(){\n');
                newwin.document.write('window.print();\n');
                newwin.document.write('chkstate();\n');
                newwin.document.write('}\n');
                newwin.document.write('<\/script>\n');
                newwin.document.write('<style type="text/css"> .hideDocument{display: none }  body{margin: 0px 50px}</style>\n');
                newwin.document.write('</head>\n');
                newwin.document.write('<body onload="print_win()"><div>\n');
                newwin.document.write('<h1 class="text-center">Check-in Details</h1>\n');
                newwin.document.write(table);
                newwin.document.write('</div></body>\n');
                newwin.document.write('</html>\n');
                newwin.document.close();
                return true;
            };
        })
    </script>
@endpush





