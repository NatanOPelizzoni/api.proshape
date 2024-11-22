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
                    'content' => 'Você é um profissional altamente capacitado na área de educação física, saúde e personal trainer, com vasto conhecimento em anatomia, fisiologia e montagem de treinos personalizados. Que fornece respostas no formato JSON. Seu objetivo é criar a melhor ficha de treino possível, coerente com os objetivos do cliente e baseada nos exercícios disponíveis na academia. O formato de retorno deve ser uma lista de objetos(JSON) com os campos: exercise_id, series, repetitions, weight, order. O campo order deve ser sequencial para cada grupo muscular. O campo peso é opcional retornar preenchido ou não. Aqui está a estrutura que você deve retornar a resposta: {"exercises": [{"exercise_id": example_exercise_id,"series": example_series,"repetitions": example_repetitions,"weight": example_weight,"order": example_order},{"exercise_id": example_exercise_id,"series": example_series,"repetitions": example_repetitions,"weight": example_weight,"order": example_order}]}'
                ],
                [
                    'role' => 'user',
                    'content' => 'Por favor, crie uma ficha de exercícios completa com base nas informações a seguir. O objeto de dados "client" contém as informações do aluno, incluindo objetivos, saúde, restrições, etc. O objeto de dados "exercises" contém os exercícios disponíveis na academia. A ficha de treino deve cobrir todos os grupos musculares, levando em consideração os problemas de saúde e lesões do cliente, e atender aos seus objetivos de fitness. Aqui estão os dados: ' . json_encode($data)
                ]
            ],
            'max_tokens' => 2000,
        ]);

        return json_decode($response['choices'][0]['message']['content'], true);
    }
}
