<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Validation\Rule;

// CreateTask.phpを継承
class EditTask extends CreateTask
{
    // 状態のルールを決定
    public function rules()
    {
        $rule = parent::rules();

        $status_rule = Rule::in(array_keys(Task::STATUS));

        return $rule + [
            'status' => 'required|' . $status_rule,
        ];
    }

    //attributesを追加
    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    // メッセージを作成
    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function($item) {
            return $item['label'];
        }, Task::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には ' . $status_labels. ' のいずれかを指定してください。',
        ];
    }
}