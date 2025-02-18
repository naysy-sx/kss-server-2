/* eslint-disable */
this.BX = this.BX || {};
this.BX.Messenger = this.BX.Messenger || {};
this.BX.Messenger.v2 = this.BX.Messenger.v2 || {};
(function (exports,main_core,im_v2_application_core,im_v2_lib_logger,im_v2_const) {
	'use strict';

	const MinimalRoleForAction = {
	  [im_v2_const.ActionByRole.readMessage]: im_v2_const.UserRole.member,
	  [im_v2_const.ActionByRole.setReaction]: im_v2_const.UserRole.member,
	  [im_v2_const.ActionByRole.openMessageMenu]: im_v2_const.UserRole.member,
	  [im_v2_const.ActionByRole.openAvatarMenu]: im_v2_const.UserRole.member,
	  [im_v2_const.ActionByRole.openSidebarMenu]: im_v2_const.UserRole.member,
	  [im_v2_const.ActionByRole.subscribeToComments]: im_v2_const.UserRole.member,
	  [im_v2_const.ActionByRole.openComments]: im_v2_const.UserRole.guest,
	  [im_v2_const.ActionByRole.openSidebar]: im_v2_const.UserRole.guest
	};

	const DEFAULT_TYPE = 'default';
	var _instance = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("instance");
	var _rolePermissions = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("rolePermissions");
	var _chatTypePermissions = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("chatTypePermissions");
	var _userTypePermissions = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("userTypePermissions");
	var _actionGroups = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("actionGroups");
	var _actionGroupsDefaultRoles = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("actionGroupsDefaultRoles");
	var _init = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("init");
	var _canPerformActionByRole = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("canPerformActionByRole");
	var _canPerformActionByChatType = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("canPerformActionByChatType");
	var _canPerformActionByChatSettings = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("canPerformActionByChatSettings");
	var _getGroupByAction = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("getGroupByAction");
	var _prepareChatTypePermissions = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("prepareChatTypePermissions");
	var _checkMinimalRole = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("checkMinimalRole");
	var _getDialog = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("getDialog");
	var _getUserType = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("getUserType");
	var _handleKickAndLeaveActionType = /*#__PURE__*/babelHelpers.classPrivateFieldLooseKey("handleKickAndLeaveActionType");
	class PermissionManager {
	  static getInstance() {
	    if (!babelHelpers.classPrivateFieldLooseBase(this, _instance)[_instance]) {
	      babelHelpers.classPrivateFieldLooseBase(this, _instance)[_instance] = new this();
	    }
	    return babelHelpers.classPrivateFieldLooseBase(this, _instance)[_instance];
	  }
	  static init() {
	    PermissionManager.getInstance();
	  }
	  constructor() {
	    Object.defineProperty(this, _handleKickAndLeaveActionType, {
	      value: _handleKickAndLeaveActionType2
	    });
	    Object.defineProperty(this, _getUserType, {
	      value: _getUserType2
	    });
	    Object.defineProperty(this, _getDialog, {
	      value: _getDialog2
	    });
	    Object.defineProperty(this, _checkMinimalRole, {
	      value: _checkMinimalRole2
	    });
	    Object.defineProperty(this, _prepareChatTypePermissions, {
	      value: _prepareChatTypePermissions2
	    });
	    Object.defineProperty(this, _getGroupByAction, {
	      value: _getGroupByAction2
	    });
	    Object.defineProperty(this, _canPerformActionByChatSettings, {
	      value: _canPerformActionByChatSettings2
	    });
	    Object.defineProperty(this, _canPerformActionByChatType, {
	      value: _canPerformActionByChatType2
	    });
	    Object.defineProperty(this, _canPerformActionByRole, {
	      value: _canPerformActionByRole2
	    });
	    Object.defineProperty(this, _init, {
	      value: _init2
	    });
	    Object.defineProperty(this, _rolePermissions, {
	      writable: true,
	      value: {}
	    });
	    Object.defineProperty(this, _chatTypePermissions, {
	      writable: true,
	      value: {}
	    });
	    Object.defineProperty(this, _userTypePermissions, {
	      writable: true,
	      value: {}
	    });
	    Object.defineProperty(this, _actionGroups, {
	      writable: true,
	      value: {}
	    });
	    Object.defineProperty(this, _actionGroupsDefaultRoles, {
	      writable: true,
	      value: {}
	    });
	    const {
	      permissions
	    } = im_v2_application_core.Core.getApplicationData();
	    im_v2_lib_logger.Logger.warn('PermissionManager: permission from server', permissions);
	    babelHelpers.classPrivateFieldLooseBase(this, _init)[_init](permissions);
	  }
	  canPerformActionByRole(actionType, dialogId) {
	    return babelHelpers.classPrivateFieldLooseBase(this, _canPerformActionByRole)[_canPerformActionByRole](actionType, dialogId) && babelHelpers.classPrivateFieldLooseBase(this, _canPerformActionByChatType)[_canPerformActionByChatType](actionType, dialogId) && babelHelpers.classPrivateFieldLooseBase(this, _canPerformActionByChatSettings)[_canPerformActionByChatSettings](actionType, dialogId);
	  }
	  canPerformActionByUserType(actionType) {
	    var _userPermissions$acti;
	    const externalUserType = babelHelpers.classPrivateFieldLooseBase(this, _getUserType)[_getUserType](im_v2_application_core.Core.getUserId());
	    const userPermissions = babelHelpers.classPrivateFieldLooseBase(this, _userTypePermissions)[_userTypePermissions][externalUserType];
	    if (!actionType || !userPermissions) {
	      return true;
	    }
	    const action = im_v2_const.ActionByUserType[actionType];
	    return (_userPermissions$acti = userPermissions[action]) != null ? _userPermissions$acti : true;
	  }
	  getDefaultRolesForActionGroups(chatType) {
	    if (!babelHelpers.classPrivateFieldLooseBase(this, _actionGroupsDefaultRoles)[_actionGroupsDefaultRoles][chatType]) {
	      return babelHelpers.classPrivateFieldLooseBase(this, _actionGroupsDefaultRoles)[_actionGroupsDefaultRoles][DEFAULT_TYPE];
	    }
	    return babelHelpers.classPrivateFieldLooseBase(this, _actionGroupsDefaultRoles)[_actionGroupsDefaultRoles][chatType];
	  }
	}
	function _init2(rawPermissions) {
	  babelHelpers.classPrivateFieldLooseBase(this, _rolePermissions)[_rolePermissions] = MinimalRoleForAction;
	  if (!rawPermissions) {
	    return;
	  }
	  const {
	    byChatType,
	    byUserType,
	    actionGroups,
	    actionGroupsDefaults
	  } = rawPermissions;
	  babelHelpers.classPrivateFieldLooseBase(this, _chatTypePermissions)[_chatTypePermissions] = babelHelpers.classPrivateFieldLooseBase(this, _prepareChatTypePermissions)[_prepareChatTypePermissions](byChatType);
	  babelHelpers.classPrivateFieldLooseBase(this, _userTypePermissions)[_userTypePermissions] = byUserType;
	  babelHelpers.classPrivateFieldLooseBase(this, _actionGroups)[_actionGroups] = actionGroups;
	  babelHelpers.classPrivateFieldLooseBase(this, _actionGroupsDefaultRoles)[_actionGroupsDefaultRoles] = actionGroupsDefaults;
	}
	function _canPerformActionByRole2(actionType, dialogId) {
	  const {
	    role: userRole
	  } = babelHelpers.classPrivateFieldLooseBase(this, _getDialog)[_getDialog](dialogId);
	  if (main_core.Type.isUndefined(babelHelpers.classPrivateFieldLooseBase(this, _rolePermissions)[_rolePermissions][actionType])) {
	    return true;
	  }
	  const minimalRole = babelHelpers.classPrivateFieldLooseBase(this, _rolePermissions)[_rolePermissions][actionType];
	  return babelHelpers.classPrivateFieldLooseBase(this, _checkMinimalRole)[_checkMinimalRole](minimalRole, userRole);
	}
	function _canPerformActionByChatType2(rawActionType, dialogId) {
	  var _babelHelpers$classPr;
	  let actionType = rawActionType;
	  const dialog = babelHelpers.classPrivateFieldLooseBase(this, _getDialog)[_getDialog](dialogId);
	  const {
	    role: userRole,
	    ownerId
	  } = dialog;
	  let {
	    type: chatType
	  } = dialog;
	  if (main_core.Type.isUndefined(babelHelpers.classPrivateFieldLooseBase(this, _chatTypePermissions)[_chatTypePermissions][chatType])) {
	    chatType = DEFAULT_TYPE;
	  }
	  actionType = babelHelpers.classPrivateFieldLooseBase(this, _handleKickAndLeaveActionType)[_handleKickAndLeaveActionType](actionType, ownerId);
	  if (main_core.Type.isUndefined((_babelHelpers$classPr = babelHelpers.classPrivateFieldLooseBase(this, _chatTypePermissions)[_chatTypePermissions][chatType]) == null ? void 0 : _babelHelpers$classPr[actionType])) {
	    return true;
	  }
	  const minimalRole = babelHelpers.classPrivateFieldLooseBase(this, _chatTypePermissions)[_chatTypePermissions][chatType][actionType];
	  return babelHelpers.classPrivateFieldLooseBase(this, _checkMinimalRole)[_checkMinimalRole](minimalRole, userRole);
	}
	function _canPerformActionByChatSettings2(actionType, dialogId) {
	  const {
	    role: userRole,
	    type: chatType,
	    permissions: chatPermissions
	  } = babelHelpers.classPrivateFieldLooseBase(this, _getDialog)[_getDialog](dialogId);
	  if (chatType === im_v2_const.ChatType.user) {
	    return true;
	  }
	  const actionGroup = babelHelpers.classPrivateFieldLooseBase(this, _getGroupByAction)[_getGroupByAction](actionType);
	  if (!actionGroup) {
	    return true;
	  }
	  let minimalRoleForGroup = chatPermissions[actionGroup];
	  if (!minimalRoleForGroup) {
	    minimalRoleForGroup = im_v2_const.UserRole.member;
	  }
	  return babelHelpers.classPrivateFieldLooseBase(this, _checkMinimalRole)[_checkMinimalRole](minimalRoleForGroup, userRole);
	}
	function _getGroupByAction2(actionType) {
	  const searchResult = Object.entries(babelHelpers.classPrivateFieldLooseBase(this, _actionGroups)[_actionGroups]).find(([_, groupActions]) => {
	    return groupActions.includes(actionType);
	  });
	  if (!searchResult) {
	    return null;
	  }
	  const [groupName] = searchResult;
	  return groupName;
	}
	function _prepareChatTypePermissions2(permissionsByChatType) {
	  const preparedPermissions = {
	    ...permissionsByChatType
	  };
	  const SERVER_USER_CHAT_TYPE = 'private';
	  preparedPermissions[im_v2_const.ChatType.user] = preparedPermissions[SERVER_USER_CHAT_TYPE];
	  return preparedPermissions;
	}
	function _checkMinimalRole2(minimalRole, roleToCheck) {
	  if (minimalRole === im_v2_const.UserRole.none) {
	    return false;
	  }
	  const roleWeights = {};
	  Object.values(im_v2_const.UserRole).forEach((role, index) => {
	    roleWeights[role] = index;
	  });
	  return roleWeights[roleToCheck] >= roleWeights[minimalRole];
	}
	function _getDialog2(dialogId) {
	  return im_v2_application_core.Core.getStore().getters['chats/get'](dialogId, true);
	}
	function _getUserType2(userId) {
	  return im_v2_application_core.Core.getStore().getters['users/get'](userId, true).type;
	}
	function _handleKickAndLeaveActionType2(actionType, ownerId) {
	  const isOwner = ownerId === im_v2_application_core.Core.getUserId();
	  // for kick check if users can leave this type of chat
	  if (actionType === im_v2_const.ActionByRole.kick) {
	    return im_v2_const.ActionByRole.leave;
	  }
	  if (actionType === im_v2_const.ActionByRole.leave && isOwner) {
	    return im_v2_const.ActionByRole.leaveOwner;
	  }
	  return actionType;
	}
	Object.defineProperty(PermissionManager, _instance, {
	  writable: true,
	  value: void 0
	});

	exports.PermissionManager = PermissionManager;

}((this.BX.Messenger.v2.Lib = this.BX.Messenger.v2.Lib || {}),BX,BX.Messenger.v2.Application,BX.Messenger.v2.Lib,BX.Messenger.v2.Const));
//# sourceMappingURL=permission.bundle.js.map
