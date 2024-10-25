<?php

namespace App\Livewire;

use App\Models\admin\Batch;
use App\Models\admin\Institute;
use App\Models\admin\Whatsapp;
use Livewire\Component;
use Twilio\Rest\Client;

class SendMessage extends Component
{
    public $batch;
    public $batch_id;
    public $message;
    public $text;
    protected $rules = [
        'text' => 'required',
    ];

    public function mount()
    {
        $this->batch =  Batch::where('institute_id', session('institute_id'))->get();
    }


    public function whatsapp()
    {
        $this->validate();
        $batch = Batch::with('student')->find($this->batch_id);

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);


        foreach ($batch->student as $key => $item) {
            if (!$item) {
                continue;
            }

            $phone = (int)$item->phone;
            if (substr($phone, 0, 1) !== '+') {
                $phone = '+880' . ltrim($phone, '0');
            }

            $message = $twilio->messages->create(
                'whatsapp:' . $phone, // to
                [
                    'from' => 'whatsapp:' . env('TWILIO_WHATSAPP_NUMBER'),
                    'body' => $this->text
                ]
            );
        }

        Whatsapp::create([
            'institute_id' => session('institute_id'),
            'batch_id' => $this->batch_id,
            'message' => $this->text
        ]);
    }

    public function render()
    {
        $this->message = Whatsapp::where('institute_id', session('institute_id'))->where('batch_id', $this->batch_id)->get();
        return view('livewire.send-message');
    }
}
