@include('includes.header')
    <div class="container my-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold">voters Availble</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>voter Name</th>
                                <th>regstration_number</th>
                                <th>programme_abbreviation</th>
                                <th>unit_abbreviation</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S/N</th>
                                <th>voter Name</th>
                                <th>regstration_number</th>
                                <th>programme_abbreviation</th>
                                <th>unit_abbreviation</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                    $sn = 1;
                                    @endphp
                                @foreach ($voters as $voter)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $voter->voter_name }}</td>
                                    <td>{{ $voter->regstration_number }}</td>
                                    <td>{{ $voter->programme_abbreviation }}</td>
                                    <td>{{ $voter->unit_abbreviation }}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('includes.footer')
