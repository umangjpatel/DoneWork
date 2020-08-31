<div>
    <section class="u-clearfix u-palette-2-base u-section-1" id="sec-b7db">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-form u-form-1 u-clearfix u-form-horizontal u-form-spacing-10 u-inner-form">
                <div class="u-form-group u-form-name u-form-group-1">
                    <label for="name-2dcc" class="u-form-control-hidden u-label">Name</label>
                    <input wire:model="newTask" type="text" placeholder="Create task" id="name-2dcc" name="newTask"
                           class="u-border-1 u-border-grey-30 u-border-radius-15 u-input u-input-round u-white"
                           required="">
                </div>
                <div class="u-align-left u-form-group u-form-submit u-form-group-2">
                    <button wire:click="saveTask"
                            class="u-border-radius-15 u-btn u-btn-round u-btn-submit u-button-style u-btn-1">Save
                    </button>
                </div>
            </div>
            @error("newTask")
            <p class="u-form-send-error u-form-send-message" style="padding: 20px"> {{$message}}
            </p>
            @enderror


            <h3 class="u-text u-text-default u-text-1" wire:poll.150ms="pollCountTasks">
                @if($countTasks == 0)
                    No tasks left
                @else
                    Tasks left : {{$countTasks}}
                @endif
            </h3>

            <div class="u-expanded-width u-list u-repeater">
                @foreach($tasks as $task)
                    <div
                        class="u-container-style u-list-item u-palette-3-dark-1 u-repeater-item u-shape-round" style="margin: 20px">
                        <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-1 u-list-item-1">
              <span class="u-icon u-icon-circle u-text-palette-1-base u-icon-1" wire:click="completeTask({{$task->id}})">
                <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 515.556 515.556" style=""><use
                        xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bc78"></use></svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     xml:space="preserve" class="u-svg-content" viewBox="0 0 515.556 515.556" id="svg-bc78"><path
                        d="m0 274.226 176.549 176.886 339.007-338.672-48.67-47.997-290.337 290-128.553-128.552z"></path></svg>
              </span>
                            <h4 class="u-text u-text-palette-1-base u-text-2">
                                {{$task->task}}
                            </h4>
                            <br>
                            <p class="u-large-text u-text u-text-black u-text-variant u-text-3">
                                Posted at {{\Carbon\Carbon::parse($task->created_at)->diffForHumans()}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
