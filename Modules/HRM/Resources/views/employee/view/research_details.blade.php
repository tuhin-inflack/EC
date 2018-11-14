@foreach($employee->employeeResearchInfo as $research)
    <table class="table">
        <tbody>

        <tr>
            <th scope="col">Organization name</th>
            <td>{{ $research->organization_name}}</td>
        </tr>
        <tr>
            <th scope="col">Research topic</th>
            <td>{{ $research->research_topic}}</td>
        </tr>
        <tr>
            <th scope="col">Responsibilities</th>
            <td>{{ $research->responsibilities}}</td>
        </tr>

        </tbody>
    </table>
@endforeach
<a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#research') }}">Edit </a>