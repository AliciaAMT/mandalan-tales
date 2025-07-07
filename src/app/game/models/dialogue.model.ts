export interface DialogueOption {
  id: string;
  text: string;
  nextDialogueId?: string;
  action?: string;
  requirements?: DialogueRequirement[];
  consequences?: DialogueConsequence[];
}

export interface DialogueRequirement {
  type: 'flag' | 'item' | 'level' | 'quest';
  key: string;
  value: any;
  operator?: 'equals' | 'greater' | 'less' | 'exists' | 'not_exists';
}

export interface DialogueConsequence {
  type: 'set_flag' | 'add_item' | 'remove_item' | 'add_experience' | 'add_gold' | 'level_up' | 'change_quest';
  key: string;
  value: any;
}

export interface DialogueNode {
  id: string;
  npcText: string;
  options: DialogueOption[];
  npcPortrait?: string;
  npcName?: string;
}

export interface DialogueTree {
  npcId: string;
  npcName: string;
  npcPortrait: string;
  nodes: DialogueNode[];
  startNodeId: string;
}

export interface DialogueState {
  currentNpcId?: string;
  currentNodeId?: string;
  dialogueHistory: string[];
  isOpen: boolean;
}

// Specific dialogue data for Father NPC based on old demo
export const FATHER_DIALOGUE: DialogueTree = {
  npcId: 'father',
  npcName: 'Father',
  npcPortrait: 'father',
  startNodeId: 'initial',
  nodes: [
    {
      id: 'initial',
      npcText: 'My child, Happy Birthday! Despite these strange events that have transpired, I have news for you that should make your Birthday very merry indeed! The elders in the village have been watching you closely for a few years now. It seems that you have caught the attention of Old Solias, the mystic. He believes you have a special gift, and he wants you to come live with him and be his apprentice. Isn\'t that wonderful? You could become a powerful magician like Solias! He could also shed some light on why you seem to be changed...',
      npcName: 'Father',
      options: [
        {
          id: 'accept_apprenticeship',
          text: 'I will go. I seek answers.',
          nextDialogueId: 'accept_apprenticeship',
          consequences: [
            { type: 'set_flag', key: 'quest1', value: 2 },
            { type: 'add_experience', key: 'experience', value: 5 },
            { type: 'add_item', key: 'letter', value: 1 }
          ]
        },
        {
          id: 'decline_apprenticeship',
          text: 'I don\'t want to go. This place is strange to me.',
          nextDialogueId: 'decline_apprenticeship',
          consequences: [
            { type: 'set_flag', key: 'quest1', value: 1 }
          ]
        }
      ]
    },
    {
      id: 'accept_apprenticeship',
      npcText: 'I will miss you, but this is an opportunity that you cannot pass up. Here is the letter from Solias. This will gain you entrance to the House of Elders, where Solias resides and where you are to meet him. The House of Elders is North from here. And don\'t forget to get some supplies before you leave. The roads are getting more treacherous every day.',
      npcName: 'Father',
      options: [
        {
          id: 'ask_advice',
          text: 'What advice can you offer me?',
          nextDialogueId: 'advice_options'
        },
        {
          id: 'maybe_later',
          text: 'Maybe Later',
          action: 'close'
        },
        {
          id: 'learn_more',
          text: 'I would like to learn more and level up.',
          nextDialogueId: 'level_up_check'
        }
      ]
    },
    {
      id: 'decline_apprenticeship',
      npcText: 'I know this must seem strange and scary for you, but this is an opportunity that you cannot pass up. Think about it a while and let me know when you change your mind.',
      npcName: 'Father',
      options: [
        {
          id: 'ok',
          text: 'Ok',
          action: 'close'
        }
      ]
    },
    {
      id: 'advice_options',
      npcText: 'If you need any help or advice, let me know. I will miss you my child.',
      npcName: 'Father',
      options: [
        {
          id: 'get_advice',
          text: 'What advice can you offer me?',
          nextDialogueId: 'random_advice'
        },
        {
          id: 'maybe_later',
          text: 'Maybe Later',
          action: 'close'
        },
        {
          id: 'learn_more',
          text: 'I would like to learn more and level up.',
          nextDialogueId: 'level_up_check'
        }
      ]
    },
    {
      id: 'random_advice',
      npcText: 'Remember to stock up on plenty of food for the journey.',
      npcName: 'Father',
      options: [
        {
          id: 'more_advice',
          text: 'Do you have any other advice to offer me?',
          nextDialogueId: 'random_advice',
          action: 'random_advice'
        },
        {
          id: 'thank_you',
          text: 'Thank you, Father.',
          action: 'close'
        }
      ]
    },
    {
      id: 'level_up_check',
      npcText: 'I\'m sorry, you need more experience to level up. But I\'m sure you will be ready in no time. Check back with me when your experience reaches 100.',
      npcName: 'Father',
      options: [
        {
          id: 'thank_you',
          text: 'Thank you, Father.',
          action: 'close'
        }
      ]
    },
    {
      id: 'change_mind',
      npcText: 'Did you change your mind about the apprenticeship and meeting with Solias?',
      npcName: 'Father',
      options: [
        {
          id: 'yes_go',
          text: 'Yes, I will go, since that is your wish, Father.',
          nextDialogueId: 'accept_apprenticeship',
          consequences: [
            { type: 'set_flag', key: 'quest1', value: 2 },
            { type: 'add_experience', key: 'experience', value: 5 },
            { type: 'add_item', key: 'letter', value: 1 }
          ]
        },
        {
          id: 'no_stay',
          text: 'No, I like it here.',
          action: 'close'
        }
      ]
    },
    {
      id: 'quest4_complete',
      npcText: 'Ah, I see you have found the family crest. It contains very special magic. Only those with great power can unlock it\'s abilities. Keep it. You will need it.',
      npcName: 'Father',
      options: [
        {
          id: 'ok_thanks',
          text: 'Ok, thank you.',
          action: 'close',
          consequences: [
            { type: 'set_flag', key: 'quest4', value: 2 }
          ]
        }
      ]
    },
    {
      id: 'shep_fed',
      npcText: 'What? You fed Old Shep? Good! Now if only I could find the key to the cellar, I could send you for more supplies down there. I know there are some nice things down there, but that lock requires a special key.',
      npcName: 'Father',
      options: [
        {
          id: 'look_for_key',
          text: 'I\'ll keep an eye out for the key.',
          action: 'close'
        }
      ]
    },
    {
      id: 'found_key',
      npcText: 'You found a Bone Key! Yes! This is the key to the cellar. Go down there to get some extra supplies for the road on the way to town. Be careful, No one has been down there for a while and there may be rats and spiders.',
      npcName: 'Father',
      options: [
        {
          id: 'be_careful',
          text: 'Ok, I\'ll be careful.',
          action: 'close',
          consequences: [
            { type: 'set_flag', key: 'shepfeed', value: 3 }
          ]
        }
      ]
    }
  ]
};

// Dialogue trees for other NPCs
export const MARAH_DIALOGUE: DialogueTree = {
  npcId: 'marah',
  npcName: 'Marah',
  npcPortrait: 'marah',
  startNodeId: 'initial',
  nodes: [
    {
      id: 'initial',
      npcText: 'Hello there, young one. I am Marah. I live here in this humble cottage. What brings you to my door?',
      npcName: 'Marah',
      options: [
        {
          id: 'greeting',
          text: 'Hello, I\'m just exploring the area.',
          nextDialogueId: 'exploring'
        },
        {
          id: 'recipes',
          text: 'I heard you have some nice recipes.',
          nextDialogueId: 'recipes'
        }
      ]
    },
    {
      id: 'exploring',
      npcText: 'Exploring is good for the soul. There\'s much to discover in these lands. Be careful though, not everything is as it seems.',
      npcName: 'Marah',
      options: [
        {
          id: 'thank_you',
          text: 'Thank you for the advice.',
          action: 'close'
        }
      ]
    },
    {
      id: 'recipes',
      npcText: 'Ah yes, I do enjoy cooking. I have several recipes I could teach you, if you\'re interested. But first, you\'ll need to prove yourself worthy.',
      npcName: 'Marah',
      options: [
        {
          id: 'how_prove',
          text: 'How can I prove myself?',
          nextDialogueId: 'prove_worthy'
        },
        {
          id: 'maybe_later',
          text: 'Maybe later.',
          action: 'close'
        }
      ]
    },
    {
      id: 'prove_worthy',
      npcText: 'Bring me some fresh herbs from the garden. I need aloe, rosemary, and sage. You can find them growing wild around here.',
      npcName: 'Marah',
      options: [
        {
          id: 'ok',
          text: 'I\'ll find those herbs for you.',
          action: 'close'
        }
      ]
    }
  ]
};

export const NPC_DIALOGUES: Record<string, DialogueTree> = {
  'father': FATHER_DIALOGUE,
  'marah': MARAH_DIALOGUE
};
