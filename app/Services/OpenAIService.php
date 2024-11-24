<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    protected $openAiClient;

    public function __construct()
    {
        $this->openAiClient = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function generateTrainingSheet(array $data)
    {
        $response = $this->openAiClient->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                'content' => 'Você é um profissional altamente capacitado na área de educação física, saúde e personal trainer, com vasto conhecimento em anatomia, fisiologia e montagem de treinos personalizados. Que fornece respostas obrigatoriamente no formato JSON sem textos além da lista de exercício e somente retorne a lista e nada mais não precisa identar a lista! Seu objetivo é criar a melhor ficha de treino possível, coerente com os objetivos do cliente pensando na quantidade de dias da semana(pensando que dia de treino deve ter pelo menos 1 hora, então monte o treino com exercícios suficientes para atender esse requisito) que o cliente vai treinar e baseada nos exercícios disponíveis na academia, no qual vai montar as fichas somente com esses exercícios,  adicionar nenhum exercício fora da lista fornecida, sempre retornando os ids(exercise_id) de cada exercício conforme o modelo de retorno fornecido a seguir. O formato de retorno deve obrigatoriamente ser uma lista de objetos(JSON) com os campos: exercise_id, series, repetitions, weight, order. O campo "order" deve ser um sequencial para cada grupo muscular, exemplo o grupo "peito" vai ter o "order" do 1 ao 5, o grupo "bíceps" vai ter o order do 1 ao 4, e assim por diante. O campo "weight" é opcional retornar preenchido. Aqui está a estrutura que você deve retornar a resposta: {"exercises": [{"exercise_id": example_exercise_id,"series": example_series,"repetitions": example_repetitions,"weight": example_weight,"order": example_order},{"exercise_id"(type number): example_exercise_id,"series"(type number): example_series,"repetitions"(type number): example_repetitions,"weight"(type number): example_weight,"order"(type number): example_order}]}'
                ],
                [
                    'role' => 'user',
                    'content' => 'Por favor, crie uma ficha de exercícios completa com base nas informações a seguir. O objeto de dados "client" contém as informações do aluno, incluindo objetivos, saúde, restrições, etc, nos quais devem ser levados em consideração na montagem de treino, pensando na melhor performance possível dentro dos limites(fisícos) que o cliente possui, e também levando em conta a experiencia que ele tem. O objeto de dados "exercises" contém os exercícios disponíveis na academia(não sugerir exercícios que não estão na lista fornecida). A ficha de treino deve cobrir todos os grupos musculares, levando em consideração os problemas de saúde e lesões do cliente, e atender aos seus objetivos de fitness. Aqui estão os dados: ' . json_encode($data)
                ]
            ],
            'max_tokens' => 2000,
        ]);

        return json_decode($response['choices'][0]['message']['content'], true);
    }
}
