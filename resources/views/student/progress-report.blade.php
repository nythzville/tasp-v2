@extends('layouts.student.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Progress Report</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Class List<small>All My Classes </small></h2>
                    
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    @if(session('success'))
                        <div class="alert alert-success">
                        <ul>
                            <li>{{session('success')}}</li>
                        </ul>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors->first() }}</li>
                        </ul>
                        </div>
                    @endif
                    <table class="table progress-report">
                        <tbody>
                            <tr>
                                <th>Student</th>
                                <th>Age</th>
                                <th>Teacher</th>
                                <th>Score</th>
                                <th>Level</th>
                                <th colspan="2">Test</th>
                            </tr>
                            <tr>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ date_diff(date_create($student->dob), date_create('now'))->y }}</td>
                                <td>{{ $teacher->firstname }}</td>
                                <td><input type="text" readonly="" name="score" value="{{ isset($student->progress_report->score)? $student->progress_report->score : ''}}"></td>
                                <td><input type="text" readonly="" name="level" value="{{ isset($student->progress_report->level)? $student->progress_report->level : ''}}"></td>
                                <td colspan="2"><input type="text" readonly="" name="test" value="{{ isset($student->progress_report->test)? $student->progress_report->test : '' }}"></td>
                            </tr>
                            <tr><td colspan="7"></td></tr>

                            <tr>
                                <th>Score</th>
                                <th>Speaking</th>
                                <th>Pronunciation</th>
                                <th>Comprehension</th>
                                <th>Grammar</th>
                                <th>Vocabulary</th>
                                <th>Total Score</th>
                            </tr>
                            <tr>
                                <th>Perfect</th>
                                <td>30</td>
                                <td>10</td>
                                <td>20</td>
                                <td>20</td>
                                <td>20</td>
                                <th>100</th>

                            </tr>
                            <tr>
                                <td>Student</td>
                                <td><input type="text" readonly="" name="student_score_speaking" value="{{ isset($student->progress_report->student_score_speaking)? $student->progress_report->student_score_speaking : '' }}"></td>
                                <td><input type="text" readonly="" name="student_score_pronunciation" value="{{ isset($student->progress_report->student_score_pronunciation)? $student->progress_report->student_score_pronunciation: '' }}"></td>
                                <td><input type="text" readonly="" name="student_score_comprehension" value="{{ isset($student->progress_report->student_score_comprehension)? $student->progress_report->student_score_comprehension: '' }}"></td>
                                <td><input type="text" readonly="" name="student_score_grammar" value="{{ isset($student->progress_report->student_score_grammar)? $student->progress_report->student_score_grammar : '' }}"></td>
                                <td><input type="text" readonly="" name="student_score_vocabulary" value="{{ isset($student->progress_report->student_score_vocabulary)? $student->progress_report->student_score_vocabulary : '' }}"></td>
                                <td><input type="text" readonly="" name="student_score_total_score" value="{{ isset($student->progress_report->student_score_total_score)? $student->progress_report->student_score_total_score : '' }}"></td>

                            </tr>

                        </tbody>
                    </table>

                    <table class="table progress-report">
                        <tbody>
                            <tr >
                                <th>Level</th>
                                <td>1 ( 10~20 )</td>
                                <td>2 ( 21~45 )</td>
                                <td>3 ( 46~55 )</td>
                                <td>4 ( 56~65 )</td>
                                <td>5 ( 66~75 )</td>
                                <td>6 ( 76~85 )</td>
                                <td>7 ( 86~100 )</td>

                            </tr>

                            <tr>
                                <th>Guide</th>
                                <td>Basic</td>
                                <td>Low</td>
                                <td>Low Intermediate</td>
                                <td>Intermediate</td>
                                <td>High Intermediate</td>
                                <td>Advance</td>
                                <td>High Advance</td>
                            </tr>
                       
                        </tbody>
                    </table>

                    <table class="table progress-report">
                        <tbody>
                            <tr>
                                <th>List</th>
                                <th colspan="3">Test Area</th>
                                <th width="50%">Comment</th>
                            </tr>
                            <tr><td colspan="6"></td></tr>

                            <tr>
                                <th colspan="2">Speaking</th>
                                <th width="10%">Score</th>
                                <th width="10%">Total</th>
                                <th>Speaking Comment</th>
                                
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Speaking</td>
                                <td><input type="text" readonly="" name="speaking_score" value="{{ isset($student->progress_report->speaking_score)? $student->progress_report->speaking_score : '' }}"></td>
                                <td><input type="text" readonly="" name="speaking_total" value="{{ isset($student->progress_report->speaking_total)? $student->progress_report->speaking_total : '' }}"></td>
                                <td><input type="text" readonly="" name="speaking_comment" value="{{ isset($student->progress_report->speaking_comment)? $student->progress_report->speaking_comment : '' }}"></td>
                            </tr>

                            <tr>
                                <th colspan="2">Pronunciation</th>
                                <th>Score</th>
                                <th>Total</th>
                                <th>Pronunciation Comment</th>
                                
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pronunciation</td>
                                <td><input type="text" readonly="" name="pronunciation_score" value="{{ isset($student->progress_report->pronunciation_score)? $student->progress_report->pronunciation_score : '' }}"></td>
                                <td><input type="text" readonly="" name="pronunciation_total" value="{{ isset($student->progress_report->pronunciation_total)? $student->progress_report->pronunciation_total : '' }}"></td>
                                <td><input type="text" readonly="" name="pronunciation_comment" value="{{ isset($student->progress_report->pronunciation_comment)? $student->progress_report->pronunciation_comment : '' }}"></td>
                            </tr>
                            <tr>
                                <th colspan="2">Comprehension</th>
                                <th>Score</th>
                                <th>Total</th>
                                <th>Comprehension Comment</th>
                                
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Comprehension</td>
                                <td><input type="text" readonly="" name="comprehension_score" value="{{ isset($student->progress_report->comprehension_score)? $student->progress_report->comprehension_score : '' }}"></td>
                                <td><input type="text" readonly="" name="comprehension_total" value="{{ isset($student->progress_report->comprehension_total)? $student->progress_report->comprehension_total : '' }}"></td>
                                <td><input type="text" readonly="" name="comprehension_comment" value="{{ isset($student->progress_report->comprehension_comment)? $student->progress_report->comprehension_comment : '' }}"></td>
                            </tr>
                            <tr>
                                <th colspan="2">Grammar</th>
                                <th>Score</th>
                                <th>Total</th>
                                <th>Grammar Comment</th>
                                
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Preciseness</td>
                                <td><input type="text" readonly="" name="preciseness_score" value="{{ isset($student->progress_report->preciseness_score)? $student->progress_report->preciseness_score : '' }}"></td>
                                <td rowspan="2"><input type="text" readonly="" name="grammar_total" value="{{ isset($student->progress_report->grammar_total)? $student->progress_report->grammar_total : '' }}"></td>
                                <td rowspan="2"><input type="text" readonly="" name="grammar_comment" value="{{ isset($student->progress_report->grammar_comment)? $student->progress_report->grammar_comment : '' }}"></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Sentence Constructions</td>
                                <td><input type="text" readonly="" name="sentence_construction_score" value="{{ isset($student->progress_report->sentence_construction_score)? $student->progress_report->sentence_construction_score : '' }}"></td>
                            </tr>
                            <tr>
                                <th colspan="2">Vocabulary</th>
                                <th>Score</th>
                                <th>Total</th>
                                <th>Vocabulary Comment</th>
                                
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Appropriateness</td>
                                <td><input type="text" readonly="" name="appropriateness_score" value="{{ isset($student->progress_report->appropriateness_score)? $student->progress_report->appropriateness_score : '' }}"></td>
                                <td rowspan="2"><input type="text" readonly="" name="vocabulary_total" value="{{ isset($student->progress_report->vocabulary_total)? $student->progress_report->vocabulary_total : '' }}"></td>
                                <td rowspan="2"><input type="text" readonly="" name="vocabulary_comment" value="{{ isset($student->progress_report->vocabulary_comment)? $student->progress_report->vocabulary_comment : '' }}"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Variety</td>
                                <td><input type="text" readonly="" name="variety_score" value="{{ isset($student->progress_report->variety_score)? $student->progress_report->variety_score : '' }}"></td>
                            </tr>
                            <tr><td colspan="6"></td></tr>
                            <tr><td colspan="6">
                                Teacher Comment
                                <textarea readonly="" name="teacher_comment">{{ isset($student->progress_report->teacher_comment)? $student->progress_report->teacher_comment : '' }}</textarea>
                            </td></tr>

                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.print();
</script>
        
@endsection
