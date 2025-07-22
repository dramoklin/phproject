<?php

class Validator  // класс дял валидации данных
{

    protected $errors = [];

    protected $rules_list = [ 'required', 'min', 'max', 'email' ];

    protected $messages = [ 
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimum :rulevalue: characters',
        'max' => 'The :fieldname: field must be a max :rulevalue: characters',
        'email' => 'Not valid email',
    ];
    public function validate($data = [], $rules = [])
    {

        foreach ($data as $fieldname => $value) {
            $field = [ 
                'fieldname' => $fieldname,
                'value' => $value,
                'rules' => $rules[ $fieldname ]
            ];
            if (array_key_exists( $fieldname, $rules )) { // поиск совпадений по индексу (имени поля в получаемом масиме) и имени в масиве rules для применения правил валидации
                $this->check( $field ); // передача в функцию  название поля и его значение c масивом правил
            }

        }
             return $this;
    }



    protected function check($field) /* Метод получает массив $field, который содержит:
'fieldname' — имя поля (например, 'username')
'value' — значение поля (например, 'Иван')
'rules' — массив правил для этого поля (например, ['required' => true, 'min' => 3]) */
    {
        foreach ($field['rules'] as $rule => $rule_value) { /*Перебираем  правила в масиве правил, которые нужно применить к этому полю.
$rule — имя правила (например, 'required', 'min', 'max', 'email')
$rule_value — значение правила (например, для 'min' => 3, $rule_value будет 3) */

            if (in_array( $rule, $this->rules_list )) // Проверяем, есть ли такое правило в списке поддерживаемых (передается в вызове обьекта класа Validator ) ($this->rules_list). Это защита от неизвестных или опечаток в правилах.
            {
                if (!call_user_func_array( [ $this, $rule ], [ $field['value'], $rule_value ] )) { /*  обработка  ошибочных случаи, когда значение введение пользователем не соответствует правилу. (call_user_func_array([$this, $rule], [...]) динамически вызывает метод с именем, совпадающим с $rule (например, $this->min() или $this->required()). Без него вызовы выглядел бы так $this->min($field['value'], $rule_value))*/
                    $this->addError( $field['fieldname'], str_replace(
                        [ ':fieldname:', ':rulevalue:' ],
                        [ $field['value'], $rule_value ],
                        $this->messages[ $rule ]
                    ) );
                }
            }
        }
    }


    protected function addError($fieldname, $error)
    {
        $this->errors[ $fieldname ][] = $error; // записывает  в масив errors ключ($fieldname) и  саму ошибку
    }

    public function getErrors(){
        return $this->errors;

    }
    public function hasErrors()
    {
          return !empty($this->errors);
    }
    protected function required($value, $rule_value)
    {
        return !empty( trim( $value ) );
    }
    protected function min($value, $rule_value) // функция на проверку длины строки 
    {
        return mb_strlen( $value, 'UTF-8' ) >= $rule_value;
    }
    protected function max($value, $rule_value) // функция на проверку длины строки 
    {
        return mb_strlen( $value, 'UTF-8' ) <= $rule_value;

    }

    protected function email($value) // функция на  існування в полі email
    {
        return filter_var( $value, FILTER_VALIDATE_EMAIL ); // Повертає відфільтровані дані - email або **false**якщо фільтрація завершилася невдачею.

    }

}




