@foreach($employee->employeeResearchInfo as $research)
    <table class="table">
        <tbody>

        <tr>
            <th scope="col">Organization name</th>
            <td>{{$research->organization_name}}</td>
        </tr>
        <tr>
            <th scope="col">Research topic</th>
            <td>{{$research->topic}}</td>
        </tr>
        <tr>
            <th scope="col">Responsibilities</th>
            <td>{{$research->responsibility}}</td>
        </tr>

        </tbody>
    </table>
@endforeach