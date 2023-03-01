<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
  <label for="student_id" class="control-label">{{ 'Student Id' }}</label>

  <select class="form-control" id="student-option" name="student_id">
    @foreach ($students as $student)
    <option value="{{ $student->id }}">{{ $student->id }}</option>
    @endforeach
  </select>

  {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
  <label for="note" class="control-label">{{ 'Note' }}</label>
  <input class="form-control" name="note" type="text" id="note" value="{{ isset($presence->note) ? $presence->note : ''}}">
  {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_at') ? 'has-error' : ''}}">
  <label for="start_at" class="control-label">{{ 'Start At' }}</label>
  <input class="form-control" name="start_at" type="datetime-local" id="start_at" value="{{ isset($presence->start_at) ? $presence->start_at : ''}}">
  {!! $errors->first('start_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_at') ? 'has-error' : ''}}">
  <label for="end_at" class="control-label">{{ 'End At' }}</label>
  <input class="form-control" name="end_at" type="datetime-local" id="end_at" value="{{ isset($presence->end_at) ? $presence->end_at : ''}}">
  {!! $errors->first('end_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
  <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>