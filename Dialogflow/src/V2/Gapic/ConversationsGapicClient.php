<?php
/*
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/dialogflow/v2/conversation.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Dialogflow\V2\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dialogflow\V2\CompleteConversationRequest;
use Google\Cloud\Dialogflow\V2\Conversation;
use Google\Cloud\Dialogflow\V2\CreateConversationRequest;
use Google\Cloud\Dialogflow\V2\GetConversationRequest;
use Google\Cloud\Dialogflow\V2\ListConversationsRequest;
use Google\Cloud\Dialogflow\V2\ListConversationsResponse;
use Google\Cloud\Dialogflow\V2\ListMessagesRequest;
use Google\Cloud\Dialogflow\V2\ListMessagesResponse;

/**
 * Service Description: Service for managing [Conversations][google.cloud.dialogflow.v2.Conversation].
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $conversationsClient = new ConversationsClient();
 * try {
 *     $formattedParent = $conversationsClient->projectName('[PROJECT]');
 *     $conversation = new Conversation();
 *     $response = $conversationsClient->createConversation($formattedParent, $conversation);
 * } finally {
 *     $conversationsClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class ConversationsGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.dialogflow.v2.Conversations';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'dialogflow.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/dialogflow',
    ];
    private static $conversationNameTemplate;
    private static $conversationProfileNameTemplate;
    private static $locationNameTemplate;
    private static $projectNameTemplate;
    private static $projectConversationNameTemplate;
    private static $projectConversationProfileNameTemplate;
    private static $projectLocationConversationNameTemplate;
    private static $projectLocationConversationProfileNameTemplate;
    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/conversations_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/conversations_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/conversations_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/conversations_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getConversationNameTemplate()
    {
        if (null == self::$conversationNameTemplate) {
            self::$conversationNameTemplate = new PathTemplate('projects/{project}/conversations/{conversation}');
        }

        return self::$conversationNameTemplate;
    }

    private static function getConversationProfileNameTemplate()
    {
        if (null == self::$conversationProfileNameTemplate) {
            self::$conversationProfileNameTemplate = new PathTemplate('projects/{project}/conversationProfiles/{conversation_profile}');
        }

        return self::$conversationProfileNameTemplate;
    }

    private static function getLocationNameTemplate()
    {
        if (null == self::$locationNameTemplate) {
            self::$locationNameTemplate = new PathTemplate('projects/{project}/locations/{location}');
        }

        return self::$locationNameTemplate;
    }

    private static function getProjectNameTemplate()
    {
        if (null == self::$projectNameTemplate) {
            self::$projectNameTemplate = new PathTemplate('projects/{project}');
        }

        return self::$projectNameTemplate;
    }

    private static function getProjectConversationNameTemplate()
    {
        if (null == self::$projectConversationNameTemplate) {
            self::$projectConversationNameTemplate = new PathTemplate('projects/{project}/conversations/{conversation}');
        }

        return self::$projectConversationNameTemplate;
    }

    private static function getProjectConversationProfileNameTemplate()
    {
        if (null == self::$projectConversationProfileNameTemplate) {
            self::$projectConversationProfileNameTemplate = new PathTemplate('projects/{project}/conversationProfiles/{conversation_profile}');
        }

        return self::$projectConversationProfileNameTemplate;
    }

    private static function getProjectLocationConversationNameTemplate()
    {
        if (null == self::$projectLocationConversationNameTemplate) {
            self::$projectLocationConversationNameTemplate = new PathTemplate('projects/{project}/locations/{location}/conversations/{conversation}');
        }

        return self::$projectLocationConversationNameTemplate;
    }

    private static function getProjectLocationConversationProfileNameTemplate()
    {
        if (null == self::$projectLocationConversationProfileNameTemplate) {
            self::$projectLocationConversationProfileNameTemplate = new PathTemplate('projects/{project}/locations/{location}/conversationProfiles/{conversation_profile}');
        }

        return self::$projectLocationConversationProfileNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'conversation' => self::getConversationNameTemplate(),
                'conversationProfile' => self::getConversationProfileNameTemplate(),
                'location' => self::getLocationNameTemplate(),
                'project' => self::getProjectNameTemplate(),
                'projectConversation' => self::getProjectConversationNameTemplate(),
                'projectConversationProfile' => self::getProjectConversationProfileNameTemplate(),
                'projectLocationConversation' => self::getProjectLocationConversationNameTemplate(),
                'projectLocationConversationProfile' => self::getProjectLocationConversationProfileNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a conversation resource.
     *
     * @param string $project
     * @param string $conversation
     *
     * @return string The formatted conversation resource.
     * @experimental
     */
    public static function conversationName($project, $conversation)
    {
        return self::getConversationNameTemplate()->render([
            'project' => $project,
            'conversation' => $conversation,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a conversation_profile resource.
     *
     * @param string $project
     * @param string $conversationProfile
     *
     * @return string The formatted conversation_profile resource.
     * @experimental
     */
    public static function conversationProfileName($project, $conversationProfile)
    {
        return self::getConversationProfileNameTemplate()->render([
            'project' => $project,
            'conversation_profile' => $conversationProfile,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a location resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     * @experimental
     */
    public static function locationName($project, $location)
    {
        return self::getLocationNameTemplate()->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     * @experimental
     */
    public static function projectName($project)
    {
        return self::getProjectNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_conversation resource.
     *
     * @param string $project
     * @param string $conversation
     *
     * @return string The formatted project_conversation resource.
     * @experimental
     */
    public static function projectConversationName($project, $conversation)
    {
        return self::getProjectConversationNameTemplate()->render([
            'project' => $project,
            'conversation' => $conversation,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_conversation_profile resource.
     *
     * @param string $project
     * @param string $conversationProfile
     *
     * @return string The formatted project_conversation_profile resource.
     * @experimental
     */
    public static function projectConversationProfileName($project, $conversationProfile)
    {
        return self::getProjectConversationProfileNameTemplate()->render([
            'project' => $project,
            'conversation_profile' => $conversationProfile,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_conversation resource.
     *
     * @param string $project
     * @param string $location
     * @param string $conversation
     *
     * @return string The formatted project_location_conversation resource.
     * @experimental
     */
    public static function projectLocationConversationName($project, $location, $conversation)
    {
        return self::getProjectLocationConversationNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'conversation' => $conversation,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a project_location_conversation_profile resource.
     *
     * @param string $project
     * @param string $location
     * @param string $conversationProfile
     *
     * @return string The formatted project_location_conversation_profile resource.
     * @experimental
     */
    public static function projectLocationConversationProfileName($project, $location, $conversationProfile)
    {
        return self::getProjectLocationConversationProfileNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'conversation_profile' => $conversationProfile,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - conversation: projects/{project}/conversations/{conversation}
     * - conversationProfile: projects/{project}/conversationProfiles/{conversation_profile}
     * - location: projects/{project}/locations/{location}
     * - project: projects/{project}
     * - projectConversation: projects/{project}/conversations/{conversation}
     * - projectConversationProfile: projects/{project}/conversationProfiles/{conversation_profile}
     * - projectLocationConversation: projects/{project}/locations/{location}/conversations/{conversation}
     * - projectLocationConversationProfile: projects/{project}/locations/{location}/conversationProfiles/{conversation_profile}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'dialogflow.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Creates a new conversation. Conversations are auto-completed after 24
     * hours.
     *
     * Conversation Lifecycle:
     * There are two stages during a conversation: Automated Agent Stage and
     * Assist Stage.
     *
     * For Automated Agent Stage, there will be a dialogflow agent responding to
     * user queries.
     *
     * For Assist Stage, there's no dialogflow agent responding to user queries.
     * But we will provide suggestions which are generated from conversation.
     *
     * If [Conversation.conversation_profile][google.cloud.dialogflow.v2.Conversation.conversation_profile] is configured for a dialogflow
     * agent, conversation will start from `Automated Agent Stage`, otherwise, it
     * will start from `Assist Stage`. And during `Automated Agent Stage`, once an
     * [Intent][google.cloud.dialogflow.v2.Intent] with [Intent.live_agent_handoff][google.cloud.dialogflow.v2.Intent.live_agent_handoff] is triggered, conversation
     * will transfer to Assist Stage.
     *
     * Sample code:
     * ```
     * $conversationsClient = new ConversationsClient();
     * try {
     *     $formattedParent = $conversationsClient->projectName('[PROJECT]');
     *     $conversation = new Conversation();
     *     $response = $conversationsClient->createConversation($formattedParent, $conversation);
     * } finally {
     *     $conversationsClient->close();
     * }
     * ```
     *
     * @param string       $parent       Required. Resource identifier of the project creating the conversation.
     *                                   Format: `projects/<Project ID>/locations/<Location ID>`.
     * @param Conversation $conversation Required. The conversation to create.
     * @param array        $optionalArgs {
     *                                   Optional.
     *
     *     @type string $conversationId
     *          Optional. Identifier of the conversation. Generally it's auto generated by Google.
     *          Only set it if you cannot wait for the response to return a
     *          auto-generated one to you.
     *
     *          The conversation ID must be compliant with the regression fomula
     *          "[a-zA-Z][a-zA-Z0-9_-]*" with the characters length in range of [3,64].
     *          If the field is provided, the caller is resposible for
     *          1. the uniqueness of the ID, otherwise the request will be rejected.
     *          2. the consistency for whether to use custom ID or not under a project to
     *          better ensure uniqueness.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dialogflow\V2\Conversation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createConversation($parent, $conversation, array $optionalArgs = [])
    {
        $request = new CreateConversationRequest();
        $request->setParent($parent);
        $request->setConversation($conversation);
        if (isset($optionalArgs['conversationId'])) {
            $request->setConversationId($optionalArgs['conversationId']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateConversation',
            Conversation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Returns the list of all conversations in the specified project.
     *
     * Sample code:
     * ```
     * $conversationsClient = new ConversationsClient();
     * try {
     *     $formattedParent = $conversationsClient->projectName('[PROJECT]');
     *     // Iterate over pages of elements
     *     $pagedResponse = $conversationsClient->listConversations($formattedParent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $conversationsClient->listConversations($formattedParent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $conversationsClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The project from which to list all conversation.
     *                             Format: `projects/<Project ID>/locations/<Location ID>`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type string $filter
     *          A filter expression that filters conversations listed in the response. In
     *          general, the expression must specify the field name, a comparison operator,
     *          and the value to use for filtering:
     *          <ul>
     *            <li>The value must be a string, a number, or a boolean.</li>
     *            <li>The comparison operator must be either `=`,`!=`, `>`, or `<`.</li>
     *            <li>To filter on multiple expressions, separate the
     *                expressions with `AND` or `OR` (omitting both implies `AND`).</li>
     *            <li>For clarity, expressions can be enclosed in parentheses.</li>
     *          </ul>
     *          Only `lifecycle_state` can be filtered on in this way. For example,
     *          the following expression only returns `COMPLETED` conversations:
     *
     *          `lifecycle_state = "COMPLETED"`
     *
     *          For more information about filtering, see
     *          [API Filtering](https://aip.dev/160).
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listConversations($parent, array $optionalArgs = [])
    {
        $request = new ListConversationsRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListConversations',
            $optionalArgs,
            ListConversationsResponse::class,
            $request
        );
    }

    /**
     * Retrieves the specific conversation.
     *
     * Sample code:
     * ```
     * $conversationsClient = new ConversationsClient();
     * try {
     *     $name = '';
     *     $response = $conversationsClient->getConversation($name);
     * } finally {
     *     $conversationsClient->close();
     * }
     * ```
     *
     * @param string $name         Required. The name of the conversation. Format:
     *                             `projects/<Project ID>/locations/<Location ID>/conversations/<Conversation
     *                             ID>`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dialogflow\V2\Conversation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getConversation($name, array $optionalArgs = [])
    {
        $request = new GetConversationRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetConversation',
            Conversation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Completes the specified conversation. Finished conversations are purged
     * from the database after 30 days.
     *
     * Sample code:
     * ```
     * $conversationsClient = new ConversationsClient();
     * try {
     *     $name = '';
     *     $response = $conversationsClient->completeConversation($name);
     * } finally {
     *     $conversationsClient->close();
     * }
     * ```
     *
     * @param string $name         Required. Resource identifier of the conversation to close.
     *                             Format: `projects/<Project ID>/locations/<Location
     *                             ID>/conversations/<Conversation ID>`.
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dialogflow\V2\Conversation
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function completeConversation($name, array $optionalArgs = [])
    {
        $request = new CompleteConversationRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CompleteConversation',
            Conversation::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Lists messages that belong to a given conversation.
     * `messages` are ordered by `create_time` in descending order. To fetch
     * updates without duplication, send request with filter
     * `create_time_epoch_microseconds >
     * [first item's create_time of previous request]` and empty page_token.
     *
     * Sample code:
     * ```
     * $conversationsClient = new ConversationsClient();
     * try {
     *     $parent = '';
     *     // Iterate over pages of elements
     *     $pagedResponse = $conversationsClient->listMessages($parent);
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // Iterate through all elements
     *     $pagedResponse = $conversationsClient->listMessages($parent);
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $conversationsClient->close();
     * }
     * ```
     *
     * @param string $parent       Required. The name of the conversation to list messages for.
     *                             Format: `projects/<Project ID>/locations/<Location
     *                             ID>/conversations/<Conversation ID>`
     * @param array  $optionalArgs {
     *                             Optional.
     *
     *     @type string $filter
     *          Optional. Filter on message fields. Currently predicates on `create_time`
     *          and `create_time_epoch_microseconds` are supported. `create_time` only
     *          support milliseconds accuracy. E.g.,
     *          `create_time_epoch_microseconds > 1551790877964485` or
     *          `create_time > 2017-01-15T01:30:15.01Z`.
     *
     *          For more information about filtering, see
     *          [API Filtering](https://aip.dev/160).
     *     @type int $pageSize
     *          The maximum number of resources contained in the underlying API
     *          response. The API may return fewer values in a page, even if
     *          there are additional values to be retrieved.
     *     @type string $pageToken
     *          A page token is used to specify a page of values to be returned.
     *          If no page token is specified (the default), the first page
     *          of values will be returned. Any page token used here must have
     *          been generated by a previous call to the API.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function listMessages($parent, array $optionalArgs = [])
    {
        $request = new ListMessagesRequest();
        $request->setParent($parent);
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }
        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }
        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->getPagedListResponse(
            'ListMessages',
            $optionalArgs,
            ListMessagesResponse::class,
            $request
        );
    }
}
