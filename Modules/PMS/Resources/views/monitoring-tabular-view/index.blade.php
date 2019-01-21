@extends('pms::layouts.master')
@section('title', 'Monitoring Tabular View')

@section('content')
    <section id="role-list">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Monitoring Tabular View</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col" rowspan="2" class="text-center">Attributes</th>
                                        <th colspan="3" class="text-center">Jan</th>
                                        <th colspan="3" class="text-center">Feb</th>
                                        <th colspan="3" class="text-center">Mar</th>
                                    </tr>
                                    <tr>
                                        <th>Planned</th>
                                        <th>Achieved</th>
                                        <th>%</th>
                                        <th>Planned</th>
                                        <th>Achieved</th>
                                        <th>%</th>
                                        <th>Planned</th>
                                        <th>Achieved</th>
                                        <th>%</th>
                                    </tr>
                                    <tbody>
                                      @foreach($projectProposal->organizations as $organization)
                                          @foreach($organization->attributes as $attribute)
                                              <tr>
                                                  <td>{{ $attribute->name }}</td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                              </tr>
                                          @endforeach
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

