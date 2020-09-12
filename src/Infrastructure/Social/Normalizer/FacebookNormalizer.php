<?php

namespace App\Infrastructure\Social\Normalizer;

use League\OAuth2\Client\Provider\FacebookUser;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FacebookNormalizer implements NormalizerInterface
{
    /**
     * @param FacebookUser $object
     */
    public function normalize($object, string $format = null, array $context = []): array
    {
        return [
            'email' => $object->getEmail(),
            'github_id' => $object->getId(),
            'type' => 'Facebook',
            'username' => $object->getName(),
        ];
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof FacebookUser;
    }
}