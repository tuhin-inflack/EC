@foreach($employee->employeeEducationInfo as  $education)
    <table class="table">
        <tbody>

        <tr>
            <th scope="col">Institute name</th>
            <td>{{ $education->institutes->name}}</td>
        </tr>
        <tr>
            <th scope="col">Department/Section/Group</th>
            <td>{{ $education->academicDepartments->name}}</td>
        </tr>
        <tr>
            <th scope="col">Degree name</th>
            <td>{{ $education->academicDegree->name}}</td>
        </tr>


        <tr>
            <th scope="col">Passing year</th>
            <td>{{ $education->passing_year}}</td>
        </tr>
        <tr>
            <th scope="col">Medium</th>
            <td>{{ $education->medium}}</td>
        </tr>
        <tr>
            <th scope="col">Result</th>
            <td>{{ $education->result}}</td>
        </tr>
        <tr>
            <th scope="col">Achievement</th>
            <td>{{ $education->achievement}}</td>
        </tr>


        </tbody>
    </table>
@endforeach
<a class="btn btn-small btn-info" href="{{ url('/hrm/employee/' . $employee->id . '/edit#education') }}">Edit </a>