<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
  <label for="student_id" class="control-label">{{ 'Student' }}</label>
  <select class="form-control" id="student-option" name="student_id">
    @if (isset($students))
    @foreach ($students as $student)
    <option value="{{ $student->id }}">{{ $student->name }}</option>
    @endforeach
    @else
    <option value="{{ $student->id }}">{{ $student->name }}</option>
    @endif
  </select>
  {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
  <input class="form-control" name="group_id" type="hidden" id="group_id" value="{{ $group->id }}">
</div>


<div class="form-group">
  <input class="btn btn-primary btn-sm mt-2" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>